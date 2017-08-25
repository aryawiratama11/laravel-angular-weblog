<!DOCTYPE html>
<html lang="en-US" ng-app="blogPostRecords">
    <head>
        <title>Laravel 5 AngularJS Weblog</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= asset('css/jquery-ui.min.css') ?>" rel="stylesheet">
    </head>
    <body>
        <h2>Posts Database</h2>
        <div  ng-controller="postsController">

            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Post Title</th>
                        <th>Post Body</th>
                        <th>Post Author</th>
                        <th>Date Posted</th>
                        <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Post</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="post in posts">
                       
                        <td>{{ post.post_title }}</td>
                        <td>{{ post.post_body }}</td>
                        <td>{{ post.post_author }}</td>
                        <td>{{ post.date_posted }}</td>
                        <td>
                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', post.id)">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(post.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmPosts" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Post Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="post_title" name="post_title" placeholder="post title" value="{{post_title}}" 
                                        ng-model="post.post_title">
                                        <span class="help-inline" 
                                        ng-show="frmPosts.post_title.$invalid && frmPosts.post_title.$touched">post title is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="post_body" class="col-sm-3 control-label">Post Body</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="post_body" name="post_body" placeholder="post body" value="{{post_body}}" 
                                        ng-model="post.post_body" >
                                        <span class="help-inline" 
                                        ng-show="frmPosts.post_body.$invalid && frmPosts.post_body.$touched">post body field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="post_author" class="col-sm-3 control-label">Post Author</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="post_author" name="post_author" placeholder="post author" value="{{post_author}}" 
                                        ng-model="post.post_author" >
                                    <span class="help-inline" 
                                        ng-show="frmPosts.post_author.$invalid && frmPosts.post_author.$touched">post author field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date_posted" class="col-sm-3 control-label">Date Posted</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control datepicker" id="date_posted" name="date_posted" placeholder="date posted" value="{{date_posted}}"
                                        ng-model="post.date_posted">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmPosts.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/jquery-ui.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/blogposts.js') ?>"></script>
    </body>
</html>