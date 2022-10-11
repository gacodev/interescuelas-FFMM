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


class TeamController extends Controller
{
    /**
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
    public function update(Request $request, $id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
