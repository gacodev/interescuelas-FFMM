<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "awards";

    protected $fillable = [
        "award",
        "description",
        "image",
    ];
}
