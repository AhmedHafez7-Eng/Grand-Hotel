<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Str;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'avatar_img'=>'default_avatar.jpg',
            'national_ID'=>'123456789012',
            'status'=>'unBan',
            'country'=>'portsaid',
            'gender'=>'male',
            'creator_id'=>1,
        ]);
    }
}
