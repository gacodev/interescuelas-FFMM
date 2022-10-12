<?php

namespace App\Http\Controllers;

use App\Imports\DisciplineImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Participant;
use App\Models\Gender;
use App\Models\Force;
use App\Models\Grade;
use App\Models\Nationality;
use App\Models\Sport;
use App\Models\Staff;
use App\Models\Type_doc;
use App\Imports\ExcelImport;
use App\Imports\SportsImport;
use App\Imports\TeamsImport;

class ParticipantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('participants.participants');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->all());

        $validated = $request->validate([
            'identification' => 'required|unique:participants',
            'type_doc_id' => 'required|exists:type_docs,id',
            'force_id' => 'required|exists:forces,id',
            'grade_id' => 'required|exists:grades,id',
            'name' => 'required',
            'blood_type' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'photo' => 'required',
            'email' => 'required|unique:participants',
            'birthday' => 'required',
            'gender_id' => 'required|exists:genders,id',
        ]);

        $data = new Participant($request->all());
        $data->save();

        $request->session()->flash('status', 'Se creo satisfactoriamente!');

        return redirect()->route('participants.registro', []);
    }

    public function participantsregister()
    {

        $forceValues = Force::all()->pluck('force', 'id');
        $sportValues = Sport::all()->pluck('sport', 'id');
        $typeDocValues = Type_doc::all()->pluck('doc_type', 'id');
        $nationalityValues = Nationality::all()->pluck('nationality', 'id');
        return view('participants.registerparticipantsform', compact('forceValues', 'sportValues', 'typeDocValues', 'nationalityValues'));
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
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */


    public function edit(Participant $participant)
    {

        return view('components.editar');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        $participant->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'photo' => $request->input('photo'),
            'blood_id' => $request->input('blood_id'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'gender_id' => $request->input('gender_id'),
            'birthday' => $request->input('birthday'),
        ]);
        return redirect("/participantes/editar")->withSuccess('Se actualizaron correctamente los datos del usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }


    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $valid_extensions = ["xlsx", "xls", "csv"];

        if (!($file && in_array($file->extension(), $valid_extensions))) {
            return back();
        }

        $import = new ExcelImport();
        $import->onlySheets('DEPORTES', 'DISCIPLINAS', 'EQUIPOS', 'PARTICIPANTES', 'PARTICIPANTES_DISCIPLINAS');

        Excel::import($import, $file);

        #$import = new DisciplineImport();
        #$import->import($file);
        #dd($import->failures());
        #dd($import->errors());

        return redirect("/importeExcel")->withSuccess('Se cargaron los participantes correctamente');
    }

    public function import()
    {

        return view('participants.importParticipants');
    }


    public function assignteam(Request $request)
    {
    }
}
