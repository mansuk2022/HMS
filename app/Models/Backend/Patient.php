<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patients";

    protected $fillable = [
        'name',
        'email',
        'contact',
        'address',
        'dieases',
        'image',
        'room_no',
        'check_in_date',
        'appointment_time',
        'description',
        'gender',
        'doctor_id',
        'status',
        'patient_id',
        'oxygen_level',
        'heart_rate',
        'sugar',
        'treatment',
        'blood_group',
        'age'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function histories(){
        return $this->hasMany(PatientHistory::class,'patient_id','id');
    }
}
