<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplinesController extends Controller
{
    public function show(Request $request)
    {
        $discipline = Discipline::where("sport_id", "=", $request->sport_id)
            ->where("gender_id", "=", $request->gender_id)
            ->get([
                "id", "discipline"
            ]);

        return $discipline;
    }

    public function getDisciplineBySport(Request $request)
    {
        $discipline = Discipline::where("sport_id", "=", $request->sport_id)
            ->get([
                "id", "discipline"
            ]);

        return $discipline;
    }

    public function index(){
        $disciplines = Discipline::
        join('sports', 'sports.id', '=', 'sport_id')
        ->join('genders', 'genders.id', '=', 'gender_id')
        ->get();
        //return $disciplines;
        return view('disciplines.getDisciplines',compact('disciplines'));
    }

    public function create(Request $request)
    {

    }

    public function edit(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}
