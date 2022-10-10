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

    public function participants()
    {
        return $this->belongsToMany(Participant::class);
    }
}
