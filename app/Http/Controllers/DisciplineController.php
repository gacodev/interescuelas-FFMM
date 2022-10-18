<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DisciplineController extends Controller
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
        /*$validated = $request->validate([
            'discipline' => 'string',
            'description' => 'required',
            'gender_id' => 'required|exists:genders,id',
            "discipline_image"=> 'required|exists',
            'sport_id' => 'required|exists:sports,id',
        ]);
        if(!$validated){
            $request->session()->flash('status', 'No se pudo crear porfavor revise los datos');
        }
        else{

            $discipline = new Discipline;
            $discipline->discipline = Input::get('discipline');
            $discipline->description = Input::get('description');
            $discipline->sport_id = Input::get('sport_id');
            $discipline->gender_id = Input::get('gender_id');
            $discipline->discipline_image = Input::get('discipline_image');
            $discipline->save();
            */
            dd($request);
        $validated = $request->parameters->validate([
            'discipline' => 'required',
            'description' => 'required',
            'gender_id' => 'required|exists:genders,id',
            "discipline_image"=> 'required|exists',
            'sport_id' => 'required|exists:sports,id',
        ]);

        $data = new Discipline($request->all());
        $data->save();
        $request->session()->flash('success', 'Se accedio correctamente');
        return redirect()->back();
    }

    public function edit(Request $request)
    {

        return redirect()->back()->with('success', 'se actualizo correctamente');
    }

    public function destroy(Discipline $discipline)
    {
        $discipline->delete();
        return redirect()->back()->with('success', 'se elimino la disciplina correctamente');
    }

}
