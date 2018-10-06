<?php

namespace App\Http\Controllers;

use App\Models\Results;
use App\Models\ResultsInfo;
use App\Models\Courses;
use App\Helpers\CsvHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Validator;

class ResultsController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
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
        return view('results.index', ['results_infos' => $course->getResultsInfos(), 'course' => $course ]);
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
            'exam_id' => 'required|integer',
            'resultsFile' => 'required|file|max:10240',
            'note' => 'nullable|string'
        ]);
        $validator = Validator::make(
            [
                'extension' => strtolower($request->resultsFile->getClientOriginalExtension()),
            ],
            [   
                'extension' => 'required|in:csv',
            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if( !$data = CsvHelper::csvToArray($request->resultsFile->getPathName()) ) {
            throw ValidationException::withMessages([
                'resultsFile' => ['Greška pri otvaranju datoteke']
             ]);
        }

        $header = [];
        foreach ($data[0] as $key => $value) {
            if (strtoupper($key) !== 'JMBAG') {
                array_push($header, $key);
            }
        }
        $results_info = ResultsInfo::create([
            'course_id' => $course->id,
            'type_id' => $request->exam_id,
            'header' => json_encode( $header ),
            'comment' => $request->note
        ]);

        $results_info->saveResults($data);

        return Redirect::action('ResultsController@index', ['course' => $course]);
    }

    // Prikazuje tablicu sa uploadanim podacima
    /**
     * Display the specified resource.
     *
     * @param  \App\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $course, ResultsInfo $result)
    {
        //
        $result->header = json_decode($result->header); 
        return view('results.show', ['results_info' => $result, 'results' => $result->results ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $course, ResultsInfo $result)
    {
        //
        $this->validate($request, [
            'exam_id' => 'required|integer',
            'resultsFile' => 'file|max:10240',
            'note' => 'nullable|string'
        ]);
        
        $result->type_id = $request->exam_id;
        $result->comment = $request->note;
        
        if( $request->has('resultsFile') ) {
            $validator = Validator::make(
                [
                    'extension' => strtolower($request->resultsFile->getClientOriginalExtension()),
                ],
                [   
                    'extension' => 'required|in:csv',
                    ]
            );
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
                
            if( !$data = CsvHelper::csvToArray($request->resultsFile->getPathName()) ) {
                throw ValidationException::withMessages([
                    'resultsFile' => ['Greška pri otvaranju datoteke']
                ]);
            }

            Results::deleteByInfo($result->id);
            
            $header = [];
            foreach ($data[0] as $key => $value) {
                if (strtoupper($key) !== 'JMBAG') {
                    array_push($header, $key);
                }
            }

            $result->header = json_encode( $header );
                    
            $result->saveResults($data);
        }
        
        $result->save();
        return Redirect::action('ResultsController@index', ['course' => $course]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $course, ResultsInfo $result)
    {
        //
        $results->delete();

        return Redirect::action('ExamController@index', ['course' => $course]);
    }
}
