<?php

namespace App\Http\Controllers;

use App\Models\score;
use Illuminate\Http\Request;

class scoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(score $score)
    {
        

        $ForcesScores = Score::
        join('participants', 'scores.participant_id', '=', 'participants.id')
        //->whereBetween('force_id', [1, 4])
        //->groupBy('award_id')
        ->get()
        ->toarray();
        $ejcScores = Score::get();
        $FacScores = Score::get()->groupBy('award_id')->toarray();
        $ArcScores = Score::get()->groupBy('award_id')->toarray();
        $Ponalscores = Score::get()->groupBy('award_id')->toarray();
        dd($ForcesScores);
        return view('resultados',compact('ForcesScores','ejeScores','FacScores','ArcScores','PonalScores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(score $score)
    {
        //
    }
}
