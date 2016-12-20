angular.module('starter.services').factory('Product', ['$resource', 'appDevConfig', function ($resource, appDevConfig) {
    return $resource(appDevConfig.baseUrl +  'api/client/products', {}, {
        query: {
            isArray: false
        }
    });
}]);
