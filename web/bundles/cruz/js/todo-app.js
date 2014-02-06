var todoApp = angular.module('todoApp', ['ngResource']);

// Adds "X-Requested-With" header to all $http requests
todoApp.run(function($http) {
    $http.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
    $http.defaults.headers.put['Content-Type'] = 'application/x-www-form-urlencoded';
});