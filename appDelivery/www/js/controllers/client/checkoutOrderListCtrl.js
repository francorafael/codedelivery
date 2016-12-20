angular.module('starter.controllers')
    .controller('ClientCheckoutOrderListCtrl',[
        '$scope', '$state', '$cart', 'OrderList', '$ionicLoading',
            function ($scope, $state, $cart, OrderList, $ionicLoading) {
                $scope.orders = OrderList.get();
                //console.log($scope.orders);
    }]);

