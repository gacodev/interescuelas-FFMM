<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Discipline;
use App\Models\DisciplineParticipant;
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
        $sports =  Sport::with([
            "discipline",
            "discipline.disciplineParticipants",
        ])->get();
        //$gold = DB::select('select COUNT(award_id) as gold FROM discipline_participants dp WHERE award_id = 1');
        $silver = DB::select('select COUNT(award_id) as silver  FROM discipline_participants dp WHERE award_id = 2');
        $bronze = DB::select('select COUNT(award_id) as bronze  FROM discipline_participants dp WHERE award_id = 3');
        $total = DB::select('select COUNT(award_id) as total FROM discipline_participants dp');
        //dd($sports);

        $goldteams = DB::table('teams')->where('award_id','=', 1)->count();
        $silverteams= DB::table('teams')->where('award_id','=', 2)->count();
        $bronzeteams = DB::table('teams')->where('award_id','=', 3)->count();
        $totalteams = DB::table('teams')->where('award_id','=', 1 )->orWhere('award_id','=', 2 )->orWhere('award_id','=', 3 )->count();

        $goldindividual = DB::table('discipline_participants')->where('award_id','=', 1)->count();
        $silverindividual = DB::table('discipline_participants')->where('award_id','=', 2)->count();
        $bronzeindividual = DB::table('discipline_participants')->where('award_id','=', 3)->count();
        $totalindividual = DB::table('discipline_participants')->where('award_id','=', 1 )->orWhere('award_id','=', 2 )->orWhere('award_id','=', 3 )->count();

        $gold = $goldindividual + $goldteams;
        $silver = $silverindividual + $silverteams;
        $bronze = $bronzeindividual + $bronzeteams;
        $total = $totalindividual + $totalteams;

       // dd($gold);

        return view('awards.awards', compact('sports','gold','silver','bronze','total'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDisciplineBySport(Request $request, Sport $sport)
    {
        $disciplines = Discipline::where('sport_id', '=', $sport->id)->get();

        return view('awards.disciplines', compact('disciplines'));
    }


    public function getParticipantsByDiscipline(Request $request, Discipline $discipline)
    {
        $participantsByDiscipline = DisciplineParticipant::with(["participant"])
            ->where('discipline_id', '=', $discipline->id)->get();

        return view('awards.participants', compact('participantsByDiscipline'));
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
            'participant_id' => $request->id,
            'discipline_id' => $request->discipline,
            'award_id' => $request->award
        ]);

        $competencia = DisciplineParticipant::where("participant_id", "=", $request->id)
            ->where("discipline_id", "=", $request->discipline)->first();

        $competencia["award_id"] = $request->award;
        $competencia->update();

        return redirect('/participantes')->withSuccess('medalla agregada correctamente');
    }

    public function deleteScore(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:participants,id',
            'discipline' => 'required|exists:disciplines,id',
        ]);

        $competencia = DisciplineParticipant::where("participant_id", "=", $request->id)
            ->where("discipline_id", "=", $request->discipline)->first();

        $competencia["award_id"] = null;
        $competencia->update();

        return redirect('/participantes')->withSuccess('medalla eliminada correctamente');
    }

    public function findBySport(score $score, Sport $sport)
    {
        $scores = Score::findOrFail($sport);
    }

    public function show(Request $request)
    {
        return view('awards.resultados');
    }

    public function show_data(score $score)
    {
        /*
        $ForcesScores = DB::select('select count(dp.award_id),a.award,f.`force`  FROM discipline_participants dp
        left join awards a on a.id = dp.award_id
        left join participants p on dp.participant_id = p.id
        left join forces f on p.force_id = f.id
        GROUP by f.`force`,award');
        $EjcScores = DB::select("select count(dp.award_id),a.award,f.`force`  FROM discipline_participants dp
        left join awards a on a.id = dp.award_id
        left join participants p on dp.participant_id = p.id
        left join forces f on p.force_id = f.id WHERE f.id = 1
        GROUP by a.award");
        $FacScores = DB::select("select count(dp.award_id),a.award,f.`force`  FROM discipline_participants dp
        left join awards a on a.id = dp.award_id
        left join participants p on dp.participant_id = p.id
        left join forces f on p.force_id = f.id WHERE f.id = 2
        GROUP by a.award ");
        $ArcScores = DB::select("select count(dp.award_id),a.award,f.`force`  FROM discipline_participants dp
        left join awards a on a.id = dp.award_id
        left join participants p on dp.participant_id = p.id
        left join forces f on p.force_id = f.id WHERE f.id = 3
        GROUP by a.award ");
        $PonalScores = DB::select("select count(dp.award_id),a.award,f.`force`  FROM discipline_participants dp
        left join awards a on a.id = dp.award_id
        left join participants p on dp.participant_id = p.id
        left join forces f on p.force_id = f.id WHERE f.id = 4
        GROUP by a.award ");
        $GendersScores = DB::select("select count(dp.award_id),a.award,f.`force`,g.sexo  from discipline_participants dp
        left join awards a on a.id = dp.award_id
        left join participants p on dp.participant_id = p.id
        left join genders g on g.id = p.gender_id
        left join forces f on p.force_id = f.id
        GROUP by f.`force`,g.sexo,dp.award_id,a.award ");

        $disciplineScores = DB::select("select count(dp.award_id),dp.discipline_id,d.discipline ,f.`force` from discipline_participants dp
        left join disciplines d on d.id = dp.discipline_id
        left join awards a on a.id = dp.award_id
        left join participants p on dp.participant_id = p.id
        left join forces f on p.force_id = f.id
        GROUP by dp.discipline_id,d.discipline ,f.`force` ");
        $sportScores = DB::select("select count(dp.award_id),s.id ,s.sport ,f.`force` from discipline_participants dp
        left join disciplines d on d.id = dp.discipline_id
        left join awards a on a.id = dp.award_id
        left join participants p on dp.participant_id = p.id
        left join forces f on p.force_id = f.id
        left join sports s on d.sport_id = s.id
        GROUP by sport_id,f.`force`");
        $teamScores = DB::select("select count(dp.award_id),f.`force` FROM discipline_participants dp
        left join teams t on t.id = dp.team_id
        left join participants p on p.id = dp.participant_id
        left join forces f on f.id = p.force_id
        left join disciplines d on d.id = dp.discipline_id
        GROUP BY f.`force`");

        return [
            "forces" => $ForcesScores,
            "EJC" => $EjcScores,
            "FAC" => $FacScores,
            "ARC" => $ArcScores,
            "PONAL" => $PonalScores,
            "BYGENDERS" => $GendersScores,
            "BYSPORTS" => $sportScores,
            "BYDISCIPLINES" => $disciplineScores,
            "BYTEAMS" => $teamScores,
        ];
        */

        $ForcesScores = DB::select("select f.`force`,
        SUM(dp.award_id  = 1) as gold, SUM(dp.award_id = 2) as silver, SUM(dp.award_id = 3) as bronze
        from forces f
        join participants p on p.force_id = f.id
        JOIN discipline_participants dp on dp.participant_id = p.id
        GROUP by f.`force`");

        $GendersScores = DB::select("select g.sexo ,
        SUM(dp.award_id  = 1) as gold, SUM(dp.award_id = 2) as silver, SUM(dp.award_id = 3) as bronze
        from genders g
        join participants p on p.gender_id  = g.id
        JOIN discipline_participants dp on dp.participant_id = p.id
        GROUP by g.sexo");

        return [
            "forces" => $ForcesScores,
            "genders" => $GendersScores,
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
