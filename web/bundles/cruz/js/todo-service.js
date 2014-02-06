todoApp.factory('Todos', ['$resource', function($resource)
{
    var _map = function(request)
    {
        console.log(request);
        var params =
        {
            id: request.id,
            text: request.text,
            completed: request.completed ? 1 : 0,
        };
        
        return $.param(params);
    };
    
    return $resource('/api/:id', {id: '@id'},
    {
        query:
        {
            method: 'GET',
            params: {},
            isArray: true,
            transformResponse: function(response)
            {
                return angular.fromJson(response);
            }
        },
        
        save:
        {
            url: '/api/new',
            method: 'POST',
            transformRequest: function(request)
            {
                return _map(request);
            }
        },
        
        update:
        {
            method: 'PUT',
            transformRequest: function(request)
            {
                return _map(request);
            }
        },

        remove:
        {
            method: 'DELETE'
        }
    });
}]);