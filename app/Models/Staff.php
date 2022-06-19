<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = "staff";

    protected $fillable = [
        "sport_id",
        "force_id",
        "grade_id",
        "name",
        "identification",
    ];
}
