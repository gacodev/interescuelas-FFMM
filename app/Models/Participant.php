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
        'blood_id',
        'height',
        'weight',
        'photo',
        'email',
        'birthday',
        'gender_id',
        'discipline_id',
        'nationality_id',
        'phone',
        'team_id'
    ];

    public function force()
    {
        return $this->belongsTo(Force::class);
    }

    public function disciplineParticipants()
    {
        return $this->hasMany(DisciplineParticipant::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }
    public function disciplines()
    {
        return $this->belongsTo(Discipline::class);
    }

    public function getGoldAwardAttribute()
    {
        $award = Award::where("award", "=", "oro")->first();
        $countAward = $this->disciplineParticipants->where("award_id", "=", $award->id)->count();
        return $countAward;
    }

    public function getSilverAwardAttribute()
    {
        $award = Award::where("award", "=", "plata")->first();
        $countAward = $this->disciplineParticipants->where("award_id", "=", $award->id)->count();
        return $countAward;
    }

    public function getBronzeAwardAttribute()
    {
        $award = Award::where("award", "=", "bronce")->first();
        $countAward = $this->disciplineParticipants->where("award_id", "=", $award->id)->count();
        return $countAward;
    }

    public function getTotalAwardAttribute()
    {
        $awards = Award::all()->pluck("id");
        $countAward = $this->disciplineParticipants->whereIn("award_id", $awards)->count();
        return $countAward;
    }
}
