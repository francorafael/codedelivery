angular.module('starter.controllers', []).controller('homeCtrl', function ($scope, $state, $stateParams) {
    $scope.state = $state.current;
    $scope.nome = $stateParams.nome;
});