<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Programm;
use App\Models\Results;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student', ['only' => 'results']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Programm::programmes();
        if( request()->has('programm') && in_array( request()->programm, Programm::programmes()->pluck('id')->toArray() ) ) {
            return view('home', [ 'courses' => Courses::courseFilter(request()->programm), 'programmes' => $programmes]);
        } else{
            return view('home', [ 'courses' => Courses::courses(), 'programmes' => $programmes]);
        }
    }

    public function results()
    {
        return view('results.showAll')->with('results', Results::getResultsForUser(auth()->user()));
    }
}
