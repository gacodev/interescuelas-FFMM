<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Force extends Model
{
    use HasFactory;

    protected $table= "forces";

    protected $fillable = [
        "force",
        "image"
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
