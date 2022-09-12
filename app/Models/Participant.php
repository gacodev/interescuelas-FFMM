<?php

namespace App\Models;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Participant extends Model
{
    use HasFactory;

    protected $table = "participants";

    protected $fillable = [
        'identification',
        'type_doc_id',
        'force_id',
        'grade_id',
        'name',
        'blood_type',
        'height',
        'weight',
        'photo',
        'email',
        'birthday',
        'gender_id',
        'discipline_id',
        'nationality_id',
        'phone'
    ];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
