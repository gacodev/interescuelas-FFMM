<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->select('name', '#identification', 'nationality', 'doc_type', 'sexo', 'force', 'color', 'sport', 'photo', 'birthday', 'phone', 'email', 'flag_image', 'award_id', 'forces.image')
            ->join('nationalities', 'nationalities.id', '=', 'nationality_id')
            ->join('type_docs', 'type_docs.id', '=', 'type_doc_id')
            ->join('genders', 'genders.id', '=', 'gender_id')
            ->join('forces', 'forces.id', '=', 'force_id')
            ->join('sports', 'sports.id', '=', 'sport_id')
            ->join('scores', 'scores.participant_id', '=', 'participants.id')
            ->get();
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
    public function create()
    {
        //
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
}
