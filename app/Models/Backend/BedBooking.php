<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedBooking extends Model
{
    use HasFactory;
    protected $table="bed_bookings";
    protected $fillable=['user_id', 'bed_no', 'reservation_date', 'user_address', 'user_contact', 'user_name'];
}
