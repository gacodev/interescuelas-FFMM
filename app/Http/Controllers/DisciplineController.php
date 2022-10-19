<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Sport;
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
        return view('disciplines.getDisciplines');
    }

    public function create(Request $request)
    {
         Discipline::create([
                'discipline' => $request['discipline'],
                'description' => $request['description'],
                'gender_id' => $request['gender_id'],
                'discipline_image' => $request['discipline_image'],
                'sport_id' => $request['sport_id']
                ]);
        $request->session()->flash('success', 'Se creo la disciplina correctamente');
        return redirect()->back();
    }

    public function update(Request $request, Discipline $discipline)
    {
        //dd($request);
        if($request->hasfile('discipline_image')){
        $discipline->update([
            'discipline' => $request->input('discipline'),
            'description' => $request->input('description'),
            'sport_id' => $request->input('sport_id'),
            'gender_id' => $request->input('gender_id'),

            ]);
        }
        else{
            $discipline->update([
                'discipline' => $request->input('discipline'),
                'description' => $request->input('description'),
                'sport_id' => $request->input('sport_id'),
                'discipline_image' => $request->input('discipline_image'),
                'gender_id' => $request->input('gender_id'),
                ]);
        }
        $request->session()->flash('success', 'Se actualizo la disciplina correctamente');
        return redirect()->back();

    }

    public function destroy(Discipline $discipline)
    {
        $discipline->delete();
        return redirect()->back()->with('success', 'se elimino la disciplina correctamente');
    }

}
