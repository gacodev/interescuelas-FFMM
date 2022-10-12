<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "sports";

    protected $fillable = [
        "sport",
        "sport_image",
        "description"
    ];

    public function discipline()
    {
        return $this->hasMany(Discipline::class);
    }

    public function getGoldAwardAttribute()
    {
        $award = Award::where("award", "=", "oro")->first();
        $disciplines = $this->discipline->pluck("id");

        $countDiciplineParticipant = DisciplineParticipant::whereIn('discipline_id', $disciplines)
            ->where("award_id", "=", $award->id)
            ->count();

        return $countDiciplineParticipant;
    }

    public function getSilverAwardAttribute()
    {
        $award = Award::where("award", "=", "plata")->first();
        $disciplines = $this->discipline->pluck("id");

        $countDiciplineParticipant = DisciplineParticipant::whereIn('discipline_id', $disciplines)
            ->where("award_id", "=", $award->id)
            ->count();

        return $countDiciplineParticipant;
    }

    public function getBronzeAwardAttribute()
    {
        $award = Award::where("award", "=", "bronce")->first();
        $disciplines = $this->discipline->pluck("id");

        $countDiciplineParticipant = DisciplineParticipant::whereIn('discipline_id', $disciplines)
            ->where("award_id", "=", $award->id)
            ->count();

        return $countDiciplineParticipant;
    }

    public function getTotalAwardAttribute()
    {
        $awards = Award::all()->pluck("id");
        $disciplines = $this->discipline->pluck("id");
        $countDiciplineParticipant = DisciplineParticipant::whereIn('discipline_id', $disciplines)
            ->whereIn("award_id", $awards)
            ->count();

        return $countDiciplineParticipant;
    }
}
