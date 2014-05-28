define([
], function () {
    angular.module('operator').register.directive('operatorHeaderNav',
        ["$http","$location",function ($http,$location) {
            return {
                restrict: 'E',
                templateUrl: __uri('./application_header.html'),
                replace: true,
                link: function($scope, $elem, $attrs) {

                }

            };
        }]
    );
});

