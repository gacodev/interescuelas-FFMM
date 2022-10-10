<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participant;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'force_id',
        'sport_id',
        'discipline_id'
    ];

    public function force()
    {
        return $this->belongsTo(Force::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function disciplineParticipants()
    {
        return $this->hasMany(DisciplineParticipant::class);
    }
}
