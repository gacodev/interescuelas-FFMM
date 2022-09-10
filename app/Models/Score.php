<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class score extends Model
{
    use HasFactory;
    protected $table= "scores";
    protected $fillable = ['participant_id','discipline_id','award_id'];
}
