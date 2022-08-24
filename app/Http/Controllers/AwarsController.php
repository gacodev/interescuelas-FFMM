<?php

namespace App\Http\Controllers;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AwarsController extends Controller
{
    public function show(Request $request)
    {

      $participants= DB::table('participants')
        ->select('name', 'identification','nationality','doc_type','sexo','force','color','photo','birthday','phone','email','flag_image','award_id','forces.image')
        ->join('nationalities', 'nationalities.id', '=', 'nationality_id')
        ->join('type_docs', 'type_docs.id', '=', 'type_doc_id')
        ->join('genders', 'genders.id', '=', 'gender_id')
        ->join('forces', 'forces.id', '=', 'force_id')
        ->leftJoin('scores', 'scores.participant_id', '=', 'participants.id')
        ->get();

      return view('awars' ,compact('participants'));
    }
}
