angular.module('starter.services')
    .factory('Order', ['$resource', 'appDevConfig', function ($resource, appDevConfig) {
    return $resource(appDevConfig.baseUrl +  'api/client/order/:id', {id: '@id'}, {
        query: {
            isArray: false
        }
    });
}]);

angular.module('starter.services')
    .factory('OrderList', ['$resource', 'appDevConfig', function ($resource, appDevConfig) {
        return $resource(appDevConfig.baseUrl +  'api/client/order/?include=:include', {include:'items,deliveryman'}, {
            get: {
                isArray: false
            }
        });
    }]);
