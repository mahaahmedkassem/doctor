<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'Position',
        'price',
        'active',
        'image'
        
    ];
    public function appointment()
    {
        return $this->hasMany('App\Models\Appointment');
    }
}
