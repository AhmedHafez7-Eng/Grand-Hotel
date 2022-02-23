<?php

namespace Database\Seeders;

use App\Models\Room;

use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'capacity' => 4,
                'price' => 300,
                'status' => 'available',
                'creator_id' => 2,
                'floor_number' => 111,
            ]
        ];

        Room::insert($rooms);
    }
}