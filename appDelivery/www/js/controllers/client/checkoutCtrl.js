angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl',[
        '$scope', '$state', '$cart', 'Order', '$ionicLoading', '$ionicPopup', 'Cupom', '$cordovaBarcodeScanner', 'User',
            function ($scope, $state, $cart, Order, $ionicLoading, $ionicPopup, Cupom, $cordovaBarcodeScanner, User) {
                var cart = $cart.get();
                $scope.cupom = cart.cupom;
                $scope.items = cart.items;
                $scope.total = $cart.getTotalFinal();

                User.authenticated({include: 'client'}, function (data) {
                    console.log(data.data)
                }, function (responseError) {
                    console.log("ERRO");
                });

                $scope.removeItem = function(i){
                    $cart.removeItem(i);
                    $scope.items.splice(i,1);
                    $scope.total = $cart.getTotalFinal();
                };

                $scope.openListProducts = function() {
                  $state.go('client.view_product');
                };

                $scope.openProductDetail = function (i){
                    $state.go('client.checkout_detail', {index: i})
                };

                $scope.save = function() {

                    if($scope.total < $scope.cupom)
                    {
                        $ionicPopup.alert({
                            title: 'Atenção',
                            template: 'Você precisa selecionar mais produtos para conseguir utilizar o cupom!'
                        });
                    } else {
                        //clonar objeto
                        var o = {items: angular.copy($scope.items)};
                        angular.forEach(o.items, function(item){
                            item.product_id = item.id;
                        });
                        $ionicLoading.show({
                            template: 'Salvando...'
                        });
                        if($scope.cupom.value)
                        {
                            o.cupom_code = $scope.cupom.code;
                        }
                        Order.save({id:null}, o, function(data) {
                            $ionicLoading.hide();
                            $state.go('client.checkout_successful');
                        }, function(responseError) {
                            $ionicLoading.hide();
                            $ionicPopup.alert({
                                title: 'Atenção',
                                template: 'Pedido não realizado! Tente Novamente!'
                            });
                        });
                    }
                };

                $scope.readBarCode = function () {
                    $cordovaBarcodeScanner
                        .scan()
                        .then(function(barcodeData) {
                            // Success! Barcode data is here
                            getValueCupom(barcodeData.text);
                        }, function(error) {
                            $ionicPopup.alert({
                                title: 'Atenção',
                                template: 'Não foi possível ler o QRCODE - Tente novamente'
                            })
                        });
                };

                $scope.removeCupom = function () {
                    $cart.removeCupom();
                    $scope.cupom = $cart.get().cupom;
                    $scope.total = $cart.getTotalFinal();
                };

                function getValueCupom(code) {

                    $ionicLoading.show({
                        template: 'Carregando...'
                    });

                    Cupom.get({code: code}, function (data) {
                        $scope.total = $cart.getTotalFinal();
                        if($scope.total < data.data.value)
                        {
                            $ionicLoading.hide();
                            $ionicPopup.alert({
                                title: 'Atenção',
                                template: 'Selecione mais produtos para utilizar o cupom no valor de R$' + data.data.value+'!'
                            });
                        } else {
                            $cart.setCupom(data.data.code, data.data.value);
                            $scope.cupom = $cart.get().cupom;
                            $scope.total = $cart.getTotalFinal();
                            $ionicLoading.hide();
                        }

                    }, function (responseError) {
                        $ionicLoading.hide();
                        $ionicPopup.alert({
                            title: 'Atenção',
                            template: 'Cupom Inválido!'
                        });
                    });
                };

    }]);

