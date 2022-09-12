<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamScores extends Model
{
    use HasFactory;
    protected $table ='teams_scores';


    public function teams()
    {
        return $this->belongsTo(Team::class);
    }
}