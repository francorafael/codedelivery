angular.module('starter.controllers')
    .controller('LoginCtrl',[
    '$scope', 'OAuth', 'OAuthToken', '$ionicPopup', '$state', '$cookies', 'User', 'UserData', 'appConfig',
    function ($scope,  OAuth, OAuthToken, $ionicPopup, $state, $cookies, User, UserData, appConfig) {

        $scope.url = appConfig.baseUrl;
        $scope.user = {
            username: "user@user.com",
            password: "123456"
        };

        $scope.login = function () {
            var promise = OAuth.getAccessToken($scope.user);
            promise
                .then(function (data) {
                    return User.authenticated({include: 'client'}).$promise;
                })
                .then(function (data){
                    UserData.set(data.data);
                    $state.go('client.view_product');
                }, function(responseError){
                    UserData.set(null);
                    OAuthToken.removeToken();
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Login e/ou senha inválidos'
                    });
                    console.debug(responseError);
                });
        };
    }])

    .controller('HomeCtrl',[
        '$scope','$cookies',
        function ($scope, $cookies) {
            $scope.user = $cookies.getObject('user');
            console.log($cookies.getObject('user'));
    }]);
