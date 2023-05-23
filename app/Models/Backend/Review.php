<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable=['patient_name', 'rating', 'review','user_id', 'status', 'doctor_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
