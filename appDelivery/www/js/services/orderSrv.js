angular.module('starter.services')
    .factory('ClientOrder', ['$resource', 'appDevConfig', function ($resource, appDevConfig) {
    return $resource(appDevConfig.baseUrl +  'api/client/order/:id', {id: '@id'}, {
        query: {
            isArray: false
        }
    });
}]);

angular.module('starter.services')
    .factory('ClientOrderList', ['$resource', 'appDevConfig', function ($resource, appDevConfig) {
        return $resource(appDevConfig.baseUrl +  'api/client/order/?include=:include', {include:'items,deliveryman'}, {
            get: {
                isArray: false
            }
        });
    }]);

angular.module('starter.services')
    .factory('DeliverymanOrder', ['$resource', 'appDevConfig', function ($resource, appDevConfig) {
        var url = appDevConfig.baseUrl + '/api/deliveryman/order/:id';
        return $resource(url, {id: '@id'}, {
            query: {
                isArray: false
            },
            updateStatus: {
                method:'PATCH',
                url: url + '/update-status'
            },
            geo:{
                method:'POST',
                url: url + '/geo'
            }
        });
    }]);