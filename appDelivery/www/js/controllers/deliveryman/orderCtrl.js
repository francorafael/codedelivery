angular.module('starter.controllers')
    .controller('DeliverymanOrderCtrl',[
        '$scope', '$state', 'DeliverymanOrder', '$ionicLoading',
        function ($scope, $state, DeliverymanOrder, $ionicLoading) {
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
                $state.go('deliveryman.view_order', {id: order.id});
            };

            function getOrders() {
                return DeliverymanOrder.get({
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

