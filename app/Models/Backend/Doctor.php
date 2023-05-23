<?php

namespace App\Models\Backend;

use App\Http\Requests\PatientRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table="doctors";

    protected $fillable=['name', 'email', 'contact', 'address', 'specialist', 'image', 'join_date', 'description', 'gender', 'user_id'];


    public function patients(){
        return $this->hasMany(Patient::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
