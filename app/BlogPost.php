<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
	 protected $table = 'blog';
    protected $fillable = array('post_title', 'post_body', 'post_author','date_posted');
}
