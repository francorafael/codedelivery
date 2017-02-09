angular.module('starter.filters').filter('statusOrder', function() {
    return function(input) {
        if(input == "Processing") {
            return "status-processing";
        } else if (input == "Delivering") {
            return "status-delivering";
        } else if (input == "Finished") {
            return "status-finished";
        }else {
            return "status-canceled";
        }
    };
});
