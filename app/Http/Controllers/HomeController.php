<?php

namespace App\Http\Controllers;
use App\Models\Participant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $participants= DB::table('participants')
        ->select('name', '#identification','nationality','doc_type','sexo','force','color','sport','photo','birthday','phone','email','flag_image','award_id','forces.image','gold','silver','bronze')
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

        return view('data',compact('participants'));
    }
}
