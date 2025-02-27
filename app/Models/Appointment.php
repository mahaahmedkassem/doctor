<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
    'name',
    'email',
    'phone',
    'department_id',
    'date',
    'messege',
    ];
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
