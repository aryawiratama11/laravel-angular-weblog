app.controller('postsController', function($scope, $http, API_URL) {
    //retrieve posts listing from API
    $http.get(API_URL + "posts")
            .success(function(response) {
                $scope.posts = response;
            });
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Post";
                break;
            case 'edit':
                $scope.form_title = "Post Detail";
                $scope.id = id;
                $http.get(API_URL + 'posts/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.post = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

   
});