<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Discipline;
use App\Models\Award;
use App\Models\Score;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $participants = DB::table('participants')
            //->select('name', 'identification','nationality','doc_type','sexo','force','color','photo','birthday','phone','email','flag_image','award_id','forces.force_image')
            ->join('nationalities', 'nationalities.id', '=', 'nationality_id')
            ->join('type_docs', 'type_docs.id', '=', 'type_doc_id')
            ->join('genders', 'genders.id', '=', 'gender_id')
            ->join('forces', 'forces.id', '=', 'force_id')
            ->leftJoin('scores', 'scores.participant_id', '=', 'participants.id')
            ->paginate(5);
       $sports = Sport::select('id','sport')->get();
        //$sports =  Sport::with(["discipline.scores"])->get();

        /*$sport =  Sport::with([
            "discipline.participants.scores",
        ])->get();


        return $sport;
        */
        //return $sports;
        return view('awards.awards', compact('sports', 'participants'));
    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDisciplineBySport(Request $request, Sport $sport)
    {
        $disciplines = Discipline::where('sport_id', '=',$sport->id)->get();
        $participants = DB::table('participants')
            ->join('nationalities', 'nationalities.id', '=', 'nationality_id')
            ->join('type_docs', 'type_docs.id', '=', 'type_doc_id')
            ->join('genders', 'genders.id', '=', 'gender_id')
            ->join('forces', 'forces.id', '=', 'force_id')
            ->leftJoin('scores', 'scores.participant_id', '=', 'participants.id')
            ->paginate(5);
        //return $disciplines;
        return view('awards.disciplines',compact('disciplines','participants'));

    }


    public function getParticipantsByDiscipline(Request $request, Discipline $discipline){
        $participantsByDiscipline = Participant::where('discipline_id', '=',$discipline->id)->paginate(5);
        $participants = DB::table('participants')
            ->join('nationalities', 'nationalities.id', '=', 'nationality_id')
            ->join('type_docs', 'type_docs.id', '=', 'type_doc_id')
            ->join('genders', 'genders.id', '=', 'gender_id')
            ->join('forces', 'forces.id', '=', 'force_id')
            ->leftJoin('scores', 'scores.participant_id', '=', 'participants.id')
            ->paginate(5);
        return view('awards.participants',compact('participantsByDiscipline','participants'));
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

        Score::create([
            'participant_id' => $request->input('id'),
            'discipline_id' => $request->input('discipline'),
            'award_id' => $request->input('award')
        ]);

        return redirect('/participantes')->withSuccess('medalla agregada correctamente');
    }

    public function findBySport(score $score, Sport $sport)
    {
        $scores = Score::findOrFail($sport);
    }

    public function show(score $score)
    {
        return view('awards.resultados');
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
