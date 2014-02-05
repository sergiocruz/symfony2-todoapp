var module = angular.module('todoApp', [], function () {

});

module.controller('todoCrl', function ($scope) {

    $scope.todos = [
        {
            text: 'Test',
            completed: true
        },

        {
            text: 'Test 2',
            completed: true
        },

        {
            text: 'Test 3',
            completed: false
        }
    ];

    $scope.todoText = '';
    $scope.addTodo = function() {

        // Does nothing if text is empty
        if (!$scope.todoText)
        {
            return;
        }

        // Adds todo to array
        $scope.todos.push({
            text: $scope.todoText,
            completed: false
        });

        // Resets todo tetx
        $scope.todoText = '';
    };
});