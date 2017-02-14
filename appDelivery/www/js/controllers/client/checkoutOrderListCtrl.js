angular.module('starter.controllers')
    .controller('ClientCheckoutOrderListCtrl',[
        '$scope', '$state', 'ClientOrderList', '$ionicLoading',
            function ($scope, $state, ClientOrderList, $ionicLoading) {
                $scope.orders = [];

                $ionicLoading.show({
                    template: 'Carregando...'
                });

                $scope.doRefresh = function (){
                    getOrders().then(function(data) {
                        $scope.orders = data.data;
                        $scope.$broadcast('scroll.refreshComplete');
                    }, function(responseError) {
                        $scope.$broadcast('scroll.refreshComplete');
                    });
                };

                $scope.openOrderDetail = function(order){
                    $state.go('client.checkout_view_order', {id: order.id});
                };

                function getOrders() {
                    return ClientOrderList.get({
                        orderBy:'created_at',
                        sortedBy: 'desc'
                    }).$promise;
                };

                getOrders().then(function(data) {
                    $scope.orders = data.data;
                    $ionicLoading.hide();
                }, function(responseError) {
                    $ionicLoading.hide();
                });

            }]);

