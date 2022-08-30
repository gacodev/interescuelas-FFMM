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
        return view('resultados');
    }

    public function show_data(score $score)
    {
        $ForcesScores = DB::select('SELECT * FROM view_awards');
        $EjcScores = DB::select("SELECT * FROM view_awards WHERE `force` = 'Ejercito Nacional'");
        $FacScores = DB::select("SELECT * FROM view_awards WHERE `force` = 'Fuerza Aerea Colombiana'");
        $ArcScores = DB::select("SELECT * FROM view_awards WHERE `force` = 'Armada Nacional'");
        $PonalScores = DB::select("SELECT * FROM view_awards WHERE `force` = 'Policia Nacional'");

        return [
            "forces" => $ForcesScores,
            "EJC" => $EjcScores,
            "FAC" => $FacScores,
            "ARC" => $ArcScores,
            "PONAL" => $PonalScores,
        ];
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
