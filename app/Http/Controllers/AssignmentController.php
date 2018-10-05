<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('cadmin');
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
            'text_link' => 'required|string|max:128',
            'assignmentFile' => 'required|file|mimes:pdf|max:10240'
        ]);
        
        $custom_file_name = time().'_'.$request->assignmentFile->getClientOriginalName();
        $directory_name = 'public/'. $course->id . '_' . $course->name . '/assignments';
        $path = $request->assignmentFile->storeAs($directory_name ,$custom_file_name);
        
        Assignment::create([
            'course_id' => $course->id,
            'link_text' => $request->text_link,
            'additional' => $request->has('additional'),
            'path'=> $path
        ]);
        
        return Redirect::action('ExamController@index', ['course' => $course]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $course, Assignment $assignment)
    {
        //
        Storage::delete($assignment->path);
        $assignment->delete();

        return Redirect::action('ExamController@index', ['course' => $course]);
    }
}
