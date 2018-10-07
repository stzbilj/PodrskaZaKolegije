<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\CourseView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseViewController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('prof', ['except' => ['index', 'show']]);
        $this->middleware('cadmin', ['only' => 'update']);
    }

    public function show ( Courses $course, int $type) {
        if( $type !== 1 && $type !== 2 ) {
            return Redirect::action('HomeController@index');
        }
        // if (CourseView::getByCourseAndType($course->id, $type))
        $course_view = CourseView::getByCourseAndType($course->id, $type);
        if (  $course_view === null) {
            $course_view = new CourseView();
            $course_view->course_id = $course->id;
            $course_view->type = $type;
            $course_view->view = '<h1>Obavijest</h1><p>Ova stranica je još u izradi.</p>';
        } elseif ($course_view->view === '' ) {
            $course_view->view = '<h1>Obavijest</h1><p>Ova stranica je još u izradi.</p>';
        }
        return view('course.courseView', ['course' => $course, 'course_view' => $course_view ]);
    }

    public function update(Request $request, Courses $course, $type)
    {
        //
        $this->validate($request, [
            'content' => 'required'
        ]);

        $course->addView( new CourseView([
            'view' => $request->content,
            'type' => $type
        ]));

        return Redirect::action('CourseViewController@show', ['course' => $course, 'type' => $type]);
    }
}
