<?php

namespace App\Http\Controllers;

use App\Models\Courses;
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
        return view('home')->with('courses', Courses::courses());
    }

    public function results()
    {
        return view('results.showAll')->with('results', Results::getResultsForUser(auth()->user()));
    }
}
