angular.module('starter.services').factory('Cupom', ['$resource', 'appDevConfig', function ($resource, appDevConfig) {
    return $resource(appDevConfig.baseUrl +  'api/cupom/:code', {code:'@code'}, {
        query: {
            isArray: false
        }
    });
}]);
