<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participant;
use App\Models\Team;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'force_id',
        'sport_id',
        'discipline_id'
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function team_scores()
    {
        return $this->hasMany(Team_scores::class);
    }
}
