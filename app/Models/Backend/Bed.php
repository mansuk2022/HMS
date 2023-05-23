<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $fillable=['room_id','bed_no','price'];

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
