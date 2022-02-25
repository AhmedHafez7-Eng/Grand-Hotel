<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Floor;

class FloorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floors = [
            [
                'name' => 'AVI',
                'creator_id' => 2,
            ]
        ];

        Floor::insert($floors);
    }
}