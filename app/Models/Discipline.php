<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $table = "disciplines";

    protected $fillable = [
        "discipline",
        "description",
        "image",
        "sport_id",
        "gender_id",
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}