angular.module('starter.services').service('User', ['$resource', 'appConfig', function ($resource, appConfig) {
    return $resource(appConfig.baseUrl +  'api', {}, {
        authenticated: {
            url: appConfig.baseUrl + 'api/authenticated',
            method: 'GET'
        },
        query: {
            isArray: false
        }
    });
}]);
