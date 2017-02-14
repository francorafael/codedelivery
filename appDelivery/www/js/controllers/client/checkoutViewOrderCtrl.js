angular.module('starter.controllers').controller('ClientCheckoutViewOrderCtrl',[
    '$scope', '$stateParams', 'ClientOrder', '$ionicLoading',
        function ($scope, $stateParams, ClientOrder, $ionicLoading) {
            $scope.ClientOrder = {};
            $ionicLoading.show({
                template: 'Carregando...'
            });

            ClientOrder.get({id: $stateParams.id, include:"items, cupom"}, function(data) {
                $scope.ClientOrder = data.data;
                $ionicLoading.hide();
            }, function(dataError) {
                $ionicLoading.hide();
            });
    }]);