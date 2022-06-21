<?php

namespace App\Http\Controllers;

use App\Models\Force;
use App\Models\Grade;
use App\Models\Sport;
use App\Models\Staff;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forceValues = Force::all()->pluck('force', 'id');
        $sportValues = Sport::all()->pluck('sport', 'id');

        return view('staff', compact('forceValues', 'sportValues'));
    }

    public function teams()
    {
        return view('teams');
    }

    public function grade_show(Request $request)
    {
        $gradeValues = Grade::where("force_id", "=", $request->force_id)->get([
            "id", "grade"
        ]);
        return $gradeValues;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validated = $request->validate([
            'force_id' => 'required|exists:forces,id',
            'sport_id' => 'required|exists:sports,id',
            'grade_id' => 'required|exists:grades,id',
            'name' => 'required',
            'identification' => 'required',
        ]);

        $data = new Staff($request->all());
        $data->save();

        $request->session()->flash('status', 'Se creo satisfactoriamente!');

        return redirect()->route('staff.index', []);
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
