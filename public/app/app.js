var app = angular.module('blogPostRecords', [])
        .constant('API_URL', 'http://localhost/angulara/public/api/v1/');

$( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
} );
