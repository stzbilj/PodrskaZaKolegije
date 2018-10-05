<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('cadmin', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Courses $course)
    {
        //
        $parameters = [
            'course' => $course,
            'exams' => $course->exams,
            'assignments' => $course->getAssignmentsByType(false),
            'additionals' => $course->getAssignmentsByType(true)
        ];
        return view('exams.index', $parameters);
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
            'year' => 'required|string|max:20',
            'exam_id' => 'required|integer',
            'examFile' => 'required|file|mimes:pdf|max:10240'
        ]);
        
        //dd($request->examFile->getClientOriginalName());
        $custom_file_name = time().'_'.$request->examFile->getClientOriginalName();
        $directory_name = 'public/'. $course->id . '_' . $course->name . '/exams';
        $path = $request->examFile->storeAs($directory_name ,$custom_file_name);
        
        Exam::create([
            'course_id' => $course->id,
            'type_id' => $request->exam_id,
            'year' => $request->year,
            'path'=> $path
        ]);
        
        return Redirect::action('ExamController@index', ['course' => $course]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $course, Exam $exam)
    {
        //
        Storage::delete($exam->path);
        $exam->delete();

        return Redirect::action('ExamController@index', ['course' => $course]);
    }
}
