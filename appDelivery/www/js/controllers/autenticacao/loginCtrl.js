angular.module('starter.controllers')
    .controller('LoginCtrl',[
    '$scope', 'OAuth', '$ionicPopup', '$state', '$cookies', 'User',
    function ($scope, OAuth, $ionicPopup, $state, $cookies, User) {

        $scope.user = {
            username: "",
            password: ""
        };

        $scope.login = function () {
            OAuth.getAccessToken($scope.user).then(function (responseSuccess) {

                User.authenticated({}, {},
                    function (data) {
                        $cookies.putObject('user', data);
                    });

                $state.go('home');
            }, function (responseError) {
                $ionicPopup.alert({
                    title: 'Advertência',
                    template: 'Login e/ou senha inválidos'
                });
            });
        };
    }])

    .controller('HomeCtrl',[
        '$scope','$cookies',
        function ($scope, $cookies) {
            $scope.user = $cookies.getObject('user');
            console.log($cookies.getObject('user'));
    }]);