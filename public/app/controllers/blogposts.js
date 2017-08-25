app.controller('postsController', function($scope, $http, API_URL) {
    //retrieve posts listing from API
    $http.get(API_URL + "blogposts").success(function(response) {
                $scope.posts = response;
            });
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Post";
                $scope.post = ''
                break;
            case 'edit':
                $scope.form_title = "Post Detail";
                $scope.id = id;
                $http.get(API_URL + 'blogposts/' + id)
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

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "blogposts";
        
        //append post id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.post),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            //console.log(response);
            $('#myModal').modal('hide');
            $http.get(API_URL + "blogposts").success(function(response) {
                $scope.posts = response;
            });
            //location.reload();
        }).error(function(response) {
            //console.log(response);
            alert('Embarrassing! An error has occurred.');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this post?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'blogposts/' + id
            }).success(function(data) {
                        //console.log(data);
                        //location.reload();
                        $http.get(API_URL + "blogposts").success(function(response) {
                            $scope.posts = response;
                        });
                    }).error(function(data) {
                        //console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }


});