todoApp.controller('todoCrl', ['$scope', 'Todos', function ($scope, Todos) {

    $scope.isLoaded = false;

    // Todo text field
    $scope.todoText = '';

    // Query all todos
    $scope.todos = Todos.query();

    $scope.todos.$promise.then(function() {
        $scope.isLoaded = true;
    });

    // Adds todo
    $scope.addTodo = function() {

        // Does nothing if text is empty
        if (!$scope.todoText)
        {
            return;
        }

        // New Todo
        var todo = {
            id: null,
            text: $scope.todoText,
            completed: 0
        };

        Todos.save(todo).$promise.then(function(todo) {
            $scope.todos.push(todo);
        });

        // Resets todo text
        $scope.todoText = '';
    };

    $scope.setCompleted = function(todo) {
        Todos.update({id: todo.id}, todo);
    };

    $scope.deleteTodo = function(todo)
    {
        var index = jQuery.inArray(todo, $scope.todos);

        $scope.todos.splice(index, 1);

        // Commits change to DB
        Todos.remove({'id': todo.id}, todo);
    };
}]);