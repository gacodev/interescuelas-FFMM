<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "disciplines";

    protected $fillable = [
        "discipline",
        "description",
        "discipline_image",
        "sport_id",
        "gender_id",
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function disciplineParticipants()
    {
        return $this->hasMany(DisciplineParticipant::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
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

    public function getTotalTeamsAttribute()
    {
        $countTeams = $this->teams->count();

        return $countTeams;
    }
}
