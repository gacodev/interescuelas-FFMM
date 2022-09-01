<?php

namespace App\Http\Controllers;
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
use App\Imports\ParticipantsImport;


class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = DB::table('participants')
            ->select('name', 'identification', 'nationality', 'doc_type', 'sexo', 'force', 'color',  'photo', 'birthday', 'phone', 'email', 'flag_image', 'award_id', 'forces.image')
            ->join('nationalities', 'nationalities.id', '=', 'nationality_id')
            ->join('type_docs', 'type_docs.id', '=', 'type_doc_id')
            ->join('genders', 'genders.id', '=', 'gender_id')
            ->join('forces', 'forces.id', '=', 'force_id')
            ->join('scores', 'scores.participant_id', '=', 'participants.id')
            ->get()->Paginate(9);
        //dd($participants);
        //dd($participants);
        //die();

        return response()->json([
            'data' => $participants,
        ]);
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
            '#identification' => 'required|unique:participants',
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
            'sport_id' => 'required|exists:sports,id',
            'category_id' => 'required|exists:categories,id'
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
        return view('registerparticipantsform', compact('forceValues', 'sportValues', 'typeDocValues', 'nationalityValues'));
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
    public function show(Participant $participant)
    {
        $data = Participant::all(); //->where($force_id= $fuerza);
        return $data;
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        $participant = Participant::find($number_id)->where($force_id = $force_id); //->where($force_id= $fuerza);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
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


    public function importExcel(Request $request){
        $file = $request->file('file');
        Excel::import(new ParticipantsImport,$file);
        
        return back()->with('Message','se registraron los participantes correctamente');
    }

    public function import(){
       
        return view('importParticipants');
    }
}
