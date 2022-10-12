<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplineParticipant extends Model
{
    use HasFactory;
    protected $table = "discipline_participants";

    protected $fillable = [
        'discipline_id',
        'participant_id',
        'award_id',
        'team_id'
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function award()
    {
        return $this->belongsTo(Award::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
}
