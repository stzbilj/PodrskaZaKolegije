<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Programm;
use \App\Models\ExamType;
use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
        return view('course.createForm', ['programmes' => Programm::programmes(), 'exams' => ExamType::examTypes(), 'professors' => User::getAllProfessors()]);
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
        $this->validate($request, [
            'name' => 'required|string',
            'programms' => 'required'
        ]);

        $course = Courses::create([
            'name' => $request->name
        ]);

        $course->programmes()->attach($request->programms);

        $users = [];
        if( $request->has('users') ) {
            $users = $request->users;
        }
        array_push( $users, auth()->user()->id);

        $course->courseAdmin()->attach($users);

        if( $request->has('exams') ) {
            $course->examsTypes()->attach($request->exams);
        }

        return Redirect::action('PostController@index', ['course' => $course]);       
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
        return view('course.edit', [
            'course' => $course,
            'programmes' => Programm::programmes(), 
            'exams' => ExamType::examTypes(), 
            'professors' => User::getAllProfessors(),
            'admins' => $course->courseAdmin()->pluck('id')->toArray(),
            'selected_programms' => $course->programmes()->pluck('id')->toArray(),
            'selected_exams' => $course->examsTypes()->pluck('id')->toArray()
        ]);
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
        $this->validate($request, [
            'name' => 'required|string',
            'programms' => 'required',
            'users' => 'required'
        ]);

        $course->name = $request->name;
        $course->save();

        $course->programmes()->sync($request->programms);

        $users = $request->users;
        $course->courseAdmin()->sync($users);
        

        if( $request->has('exams') ) {
            $course->examsTypes()->sync($request->exams);
        }

        return Redirect::action('PostController@index', ['course' => $course]); 
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
        $directory = 'public/'. $course->id . '_' . $course->name;
        Storage::deleteDirectory($directory);
        
        $course->delete();

        return Redirect::action('HomeController@index');
    }
}
