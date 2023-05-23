<?php

namespace Database\Seeders;

use App\Models\Backend\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'room_name' => 'Emergency ward',
            'floor' => '1st Floor',
            'room_no'=>1,
        ]);

        Room::create([
            'room_name' => 'Icu Ward',
            'floor' => '3rd Floor',
            'room_no' => 2,
        ]);

        Room::create([
            'room_name' => 'General Ward',
            'floor' => 'Ground Floor',
            'room_no' => 3,
        ]);

        Room::create([
            'room_name' => 'Gynecology',
            'floor' => '2nd Floor',
            'room_no' => 9,
        ]);
        Room::create([
            'room_name' => 'Cardiology',
            'floor' => '4th Floor',
            'room_no' => 8
        ]);
        
    }
}
