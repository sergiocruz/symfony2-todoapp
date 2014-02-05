var todo = angular.module('todoapp');

todo.controller('TodoController', ['$scope', function($scope) {
	$scope.todos = ['test', 'test2'];
}]);