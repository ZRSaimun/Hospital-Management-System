<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function appoint()
    {
        return $this->belongsTo('App\Models\Patient', 'patient_id', 'emp_id');
    }
}
