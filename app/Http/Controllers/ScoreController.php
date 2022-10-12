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
        $participants = Participant::with([
            "disciplineParticipants",
            "disciplineParticipants.award",
            "disciplineParticipants.discipline",
            "disciplineParticipants.discipline.sport",
            "force",
            "nationality",
        ])->paginate(5);

        $sports =  Sport::with([
            "discipline",
            "discipline.disciplineParticipants",
        ])->get();

        //return $sports[12]->gold_award;
        //return $sports[0]->discipline[0]->bronze_award;
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
        $disciplines = Discipline::where('sport_id', '=', $sport->id)->get();
        $participants = Participant::with([
            "disciplineParticipants",
            "disciplineParticipants.award",
            "disciplineParticipants.discipline",
            "disciplineParticipants.discipline.sport",
            "force",
            "nationality",
        ])->paginate(5);
        return view('awards.disciplines', compact('disciplines', 'participants'));
    }


    public function getParticipantsByDiscipline(Request $request, Discipline $discipline)
    {
        $participantsByDiscipline = DisciplineParticipant::with(["participant"])
            ->where('discipline_id', '=', $discipline->id)->paginate(5);

        $participants = Participant::with([
            "disciplineParticipants",
            "disciplineParticipants.award",
            "disciplineParticipants.discipline",
            "disciplineParticipants.discipline.sport",
            "force",
            "nationality",
        ])->paginate(5);
        return view('awards.participants', compact('participantsByDiscipline', 'participants'));
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

    public function show(Request $request)
    {
        return view('awards.resultados');
    }

    public function show_data(score $score)
    {
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
