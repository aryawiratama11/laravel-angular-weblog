<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPost extends Controller
{
    
    /**
     * Display a listing of the blog post.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return BlogPost::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created blog post in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $post = new BlogPost;

        $post->post_title = $request->input('post_title');
        $post->post_body = $request->input('post_body');
        $post->post_author = $request->input('post_author');
        $post->date_posted = $request->input('date_posted');
        $post->save();

        return 'Blog post record successfully created with id ' . $post->id;
    }

    /**
     * Display the specified blog post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return BlogPost::find($id);
    }

    /**
     * Update the specified blog post in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $post = BlogPost::find($id);

        $post->post_title = $request->input('post_title');
        $post->post_body = $request->input('post_body');
        $post->post_author = $request->input('post_author');
        $post->date_posted = $request->input('date_posted');
        $post->save();

        return "Sucess updating post #" . $post->id;
    }

    /**
     * Remove the specified blog post from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $post = BlogPost::find($request->input('id'));

        $post->delete();

        return "Blog post record successfully deleted #" . $request->input('id');
    }

}
