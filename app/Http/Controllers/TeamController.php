<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Participant;
use App\Models\Force;
use App\Models\Range;
use App\Models\Sport;
use App\Models\Discipline;
use App\Models\DisciplineParticipant;


class TeamController extends Controller
{
    /**TeamindexControllerTeamindexController
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teams.teams');
    }
    public function teams_create()
    {
        $search = '';
        $forceValues = Force::all()->pluck('force', 'id');
        $sportValues = Sport::all()->pluck('sport', 'id');
        $disciplineValues = Discipline::where('sport_id', 'like','%'.$search.'%')->pluck('discipline', 'id');
        return view('teams.teamscreate', compact('forceValues', 'sportValues','disciplineValues'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'force_id' => 'required|exists:forces,id',
            'sport_id' => 'required|exists:sports,id',
            'discipline_id' => 'required|exists:disciplines,id',
        ]);

        $data = new Team($request->all());
        $data->save();

        $request->session()->flash('status', 'Se creo satisfactoriamente!');

        return redirect()->back();
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

    public function desasociar(Request $request)
    {
        $result = DisciplineParticipant::
        where('discipline_id', '=', $request->discipline)
        ->where('participant_id','=',$request->id)
        ->where('team_id','=',$request->team);
        $result->delete();
        return redirect()->back()->withSuccess('Se desasocio del equipo correctamente');
    }

    public function asociarparticipante(Request $request)
    {
        //dd($request);
        /*$validated = $request->validate([
            'participant_id' => 'number',
            'team_id' => 'number',
            'discipline_id' => 'number',
        ]);*/

        $data = new DisciplineParticipant($request->all());
        $data->save();

        $request->session()->flash('status', 'Se asocio el participante satisfactoriamente!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);

        $data = Team::where('id','=',$request->input('team_id'));
        $data->update(['award_id'=>$request->input('award_id')]);

        $request->session()->flash('success', 'La medalla se asigno correctamente');
        return redirect()->back();
    }

    public function range_show(Request $request)
    {

        $rangeValues = Range::where("force_id", "like", $request->force_id)->get([
            "id", "range"
        ]);
        return $RangeValues;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function quitar(Request $request)
    {
        //dd($request);
        $data = Team::where('id','=',$request->input('team_id'));
        $data->update(['award_id'=>null]);

        $request->session()->flash('success', 'La medalla se elimino correctamente');
        return redirect()->back();
    }
}
