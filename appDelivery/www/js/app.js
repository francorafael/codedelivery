// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'

angular.module('starter.controllers', []);
angular.module('starter.filters', []);
angular.module('starter.services', ['ngResource']);
angular.module('starter.directives', []);

var starter = angular.module('starter', ['ionic', 'starter.controllers', 'starter.services', 'starter.filters',
                                            'angular-oauth2', 'ngCordova']);

starter.provider('appConfig', ['$httpParamSerializerProvider', function($httpParamSerializerProvider){
    var config = {
        //baseUrl: 'http://192.168.0.94:8000/',
       baseUrl: 'http://localhost:8000/',
    };
    return {
        config: config,
        $get: function() {
            return config;
        }
    }
}]);

starter.constant('appDevConfig', {
    //baseUrl: 'http://192.168.0.94:8000/'
    baseUrl: 'http://localhost:8000/'
});

starter.service('cart', function() {
   this.items = [];
});



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

starter.config(['$stateProvider', '$urlRouterProvider', 'OAuthProvider', 'OAuthTokenProvider', 'appDevConfig', '$provide',
    function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider, appDevConfig, $provide) {


        /*AUTENTICACAO*/
        OAuthProvider.configure({
            baseUrl: appDevConfig.baseUrl,
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
                templateUrl: 'templates/autenticacao/login.html',
                controller: 'LoginCtrl'
            })
            /*HOME*/
            .state('home', {
                cache: false,
                url:'/home',
                templateUrl: 'templates/home.html',
                controller:  'HomeCtrl'
            })
            /*CLIENT*/
            .state('client', {
                abstract: true,
                url:'/client',
                templateUrl:'templates/client/menu.html',
                controller: 'ClientMenuCtrl'
            })
            .state('client.checkout', {
                cache: false,
                url: '/checkout',
                templateUrl: 'templates/client/checkout.html',
                controller: 'ClientCheckoutCtrl'
            })
            .state('client.checkout_detail', {
                url: '/checkout/detail/:index',
                templateUrl: 'templates/client/checkout-detail.html',
                controller: 'ClientCheckoutDetailCtrl'
            })

            .state('client.checkout_successful', {
                cache: false,
                url: '/checkout/successful',
                templateUrl: 'templates/client/checkout-successful.html',
                controller: 'ClientCheckoutSuccessfulCtrl'
            })

            .state('client.checkout_orders', {
                cache: false,
                url: '/checkout/orders',
                templateUrl: 'templates/client/checkout-orders.html',
                controller: 'ClientCheckoutOrderListCtrl'
            })

            .state('client.checkout_view_order', {
                cache: false,
                url: '/checkout/view_order/:id',
                templateUrl: 'templates/client/view-order.html',
                controller: 'ClientCheckoutViewOrderCtrl'
            })

            .state('client.view_product', {
                url: '/view_products',
                templateUrl: 'templates/client/view-product.html',
                controller: 'ClientViewProductCtrl'
            })
        ;
        $urlRouterProvider.otherwise('/login');

        $provide.decorator('OAuthToken', ['$localStorage', '$delegate',  function ($localStorage, $delegate) {
            //DEFINIR PROPRIEDADES DESSE OBJETO
            Object.defineProperties($delegate, {
                setToken: {
                    value: function(data) {
                        $localStorage.setObject('token', data);
                    },
                    enumerable:true,
                    configurable:true,
                    writable:true
                },
                getToken: {
                    value: function() {
                        return $localStorage.getObject('token');
                    },
                    enumerable:true,
                    configurable:true,
                    writable:true
                },
                removeToken: {
                    value: function() {
                        $localStorage.setObject('token', null);
                    },
                    enumerable:true,
                    configurable:true,
                    writable:true
                }
            });

            return $delegate;
        }]);
    }]);
