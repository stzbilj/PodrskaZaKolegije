<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('prof', ['except' => ['index']]);
        $this->middleware('cadmin', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Courses $course)
    {
        //
        return view('posts.index', ['posts' => $course->getOrderedPosts(), 'course' => $course ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Courses $course)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'note' => 'required'
        ]);

        auth()->user()->publish( new Post( [
            'title' => request('title'), 
            'note'=> request('note'), 
            'course_id'=> $course->id] 
        ));

        return Redirect::action('PostController@index', ['course' => $course]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $course, Post $post)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'note' => 'required'
        ]);

        $post->title = request('title');
        $post->note = request('note');

        $post->save();

        return Redirect::action('PostController@index', ['course' => $course]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $course, Post $post)
    {
        //
        $post->delete();
        
        return Redirect::action('PostController@index', ['course' => $course]);
    }
}
