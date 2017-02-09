angular.module('starter.filters').filter('join', function() {
   return function (input, joinStr) {
       //transformar o array em string
       return input.join(joinStr);
   };
});