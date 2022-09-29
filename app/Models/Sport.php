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
}
