angular.module('starter.controllers')
    .controller('LoginCtrl',[
    '$scope', 'OAuth', '$ionicPopup', '$state', '$cookies', 'User', 'appConfig',
    function ($scope, OAuth, $ionicPopup, $state, $cookies, User, appConfig) {
        $scope.url = appConfig.baseUrl;
        $scope.user = {
            username: "user@user.com",
            password: "123456"
        };

        $scope.login = function () {
            OAuth.getAccessToken($scope.user).then(function (responseSuccess) {

                User.authenticated({}, {},
                    function (data) {
                        $cookies.putObject('user', data);
                    });

                $state.go('client.view_product');
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
