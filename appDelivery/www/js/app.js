// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'

var starter = angular.module('starter', ['ionic', 'starter.controllers', 'starter.services', 'angular-oauth2']);

angular.module('starter.controllers', ['ngMessages', 'angular-oauth2']);
angular.module('starter.filters', []);
angular.module('starter.services', ['ngResource']);
angular.module('starter.directives', []);


starter.provider('appConfig', ['$httpParamSerializerProvider', function($httpParamSerializerProvider){
    var config = {
        baseUrl: 'http://localhost:8000/',
    };
    return {
        config: config,
        $get: function() {
            return config;
        }
    }
}]);

starter.run(['$ionicPlatform', function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
}])

starter.config(['$stateProvider', '$urlRouterProvider', 'OAuthProvider', 'OAuthTokenProvider', function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider) {

        /*AUTENTICACAO*/
        OAuthProvider.configure({
            baseUrl: 'http://localhost:8000/',
            clientId: 'appid1',
            clientSecret: 'secret', // optional
            grantPath: 'oauth/access_token'
        });

        /*GERAR O SERVICO QUE VAI ARMAZENAR O TOKEN DE ACESSO*/
        OAuthTokenProvider.configure({
            name: 'token',
            options: {
                secure: false
            }
        });

        /*ROTAS E ESTADO*/
        $stateProvider
            /*LOGIN*/
            .state('login', {
                url:'/login',
                templateUrl: 'templates/login.html',
                controller: 'LoginCtrl'
            })
            /*HOME*/
            .state('home', {
                url:'/home',
                templateUrl: 'templates/home.html',
                controller: 'HomeCtrl'
            })
        ;
        $urlRouterProvider.otherwise('/');
    }]);
