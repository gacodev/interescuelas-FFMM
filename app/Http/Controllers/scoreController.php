<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants= DB::table('participants')
        //->select('name', 'identification','nationality','doc_type','sexo','force','color','photo','birthday','phone','email','flag_image','award_id','forces.force_image')
        ->join('nationalities', 'nationalities.id', '=', 'nationality_id')
        ->join('type_docs', 'type_docs.id', '=', 'type_doc_id')
        ->join('genders', 'genders.id', '=', 'gender_id')
        ->join('forces', 'forces.id', '=', 'force_id')
        ->leftJoin('scores', 'scores.participant_id', '=', 'participants.id')
        ->paginate(5);
        $sports= Sport::all()->pluck('sport');
         dd($participants);
         return view('awards',compact('sports','participants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'participant_id' => $request->input('id'),
            'discipline_id' => $request->input('discipline'),
            'award_id' => $request->input('award')
        ]);

        Score::create(['participant_id' => $request->input('id'),
        'discipline_id' => $request->input('discipline'),
        'award_id' => $request->input('award')
        ]);

        return redirect('/participantes')->withSuccess('medalla agregada correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\score  $score
     * @return \Illuminate\Http\Response
     */

    public function findBySport(score $score, Sport $sport)
    {
        $scores = Score::findOrFail($sport);
    }

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
