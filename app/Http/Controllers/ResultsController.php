<?php

namespace App\Http\Controllers;

use App\Models\Results;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Courses $course)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Courses $course)
    {
        //
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
        // dd($request->examFile->getPathName());

    }

    // Prikazuje tablicu sa uploadanim podacima
    /**
     * Display the specified resource.
     *
     * @param  \App\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function show(Results $results, Courses $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function edit(Results $results, Courses $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $course, Results $results)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function destroy(Results $results, Courses $course)
    {
        //
    }
}
