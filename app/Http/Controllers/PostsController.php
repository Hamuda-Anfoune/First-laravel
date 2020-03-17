<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // BRINGING THE MODEL
use DB;

class PostsController extends Controller
{
    public function email(request $request){
        $email = $request->input('email');
        $shortEmail = substr($email, 0, strpos($email, "@"));// use shortening formula here!

        // Both of below work
        // return $shortEmail;
        return view("pages.email")->with('shortEmail',$shortEmail);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*
            USING SQL QUERY
            RETURNS EVERYTHING FROM posts TABLE
        */
        // $posts = DB::select('SELECT * FROM posts');

        /*
            BELOW USES ELOQUENT
            WORKS AS ENTITY FRAMEWORK
            NEED TO CALL MODEL: Post
        */

        // returns all posts from DB
        // $posts = Post::all();

        // retrns posts by creation date in decsending order, asc woukd ascendinng
        // $posts = Post::orderBy('created_at', 'desc')->get(); // Does not work with the {{$posts->links()}} in target page or in the template page

        // Returns only one result
        // $posts = Post::orderBy('created_at', 'desc')->take(1)->get();

        // returns paginated resoults
        $posts = Post::orderBy('created_at', 'desc')->paginate(10); // needs {{$posts->links()}} to work properly, added in target page or the template page

        return view('posts.index')->with('posts', $posts);
    }

    // returning a json object of a post found by title
    public function postByTitle($title)
    {
        return Post::where('title', 'title 02')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // Array of rules
            'title' => 'required',
            'body' => 'required'
        ]);

        // Creating a new post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Created'); // success: type of message, Post Created: msg body
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view("posts.show")->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view("posts.edit")->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // Array of rules
            'title' => 'required',
            'body' => 'required'
        ]);

        // Creating a new post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated'); // success: type of message, Post Created: msg body
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post Removed');
    }

}
