<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Programm;
use \App\Models\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('prof', ['except' => ['index', 'show']]);
        $this->middleware('cadmin', ['only' => ['edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Redirect::action('HomeController@index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('course.createForm', ['programmes' => Programm::programmes(), 'exams' => ExamType::examTypes()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Courses  $course
     * @return \Illuminate\Http\Response
     */
    public function show( Courses $course)
    {
        //
        return Redirect::action('PostController@index', ['course' => $course]);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Courses  $course
     * @return \Illuminate\Http\Response
     */
    public function edit( Courses $course )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Courses  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Courses  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $course)
    {
        //
        // Storage::deleteDirectory($directory);
    }
}
