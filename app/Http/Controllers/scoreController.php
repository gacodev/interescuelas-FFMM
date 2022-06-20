<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $ForcesScores = DB::select('SELECT * FROM view_awars');
        $ejeScores = DB::select("SELECT * FROM view_awars WHERE `force` = 'Ejercito Nacional'");
        $FacScores = DB::select("SELECT * FROM view_awars WHERE `force` = 'Fuerza Aerea Colombiana'");
        $ArcScores = DB::select("SELECT * FROM view_awars WHERE `force` = 'Armada Nacional'");
        $PonalScores = DB::select("SELECT * FROM view_awars WHERE `force` = 'Policia Nacional'");

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
