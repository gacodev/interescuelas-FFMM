<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Force extends Model
{
    protected $fillable = [
        'force',
        'description',
        'image',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/forces/'.$this->getKey());
    }
}
