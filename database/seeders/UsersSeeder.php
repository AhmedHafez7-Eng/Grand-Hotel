<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        $users = [
            [
                'name' => 'Noha Ahmed',
                'email' => 'admin2@admin.com',
                'password' => Hash::make('1234567890'),
                'national_ID' => '29807244444434',
                'role' => 'admin',
                'country' => 'Egypt',
                'gender' => 'female',
            ]
            // ,
            // [
            //     'name' => 'Noha Ahmed',
            //     'email' => 'manager2@manager.com',
            //     'password' => '22455678',
            //     'national_ID' => '27904221288877',
            //     'role' => 'manager',
            //     'country' => 'Egypt',
            //     'gender' => 'female',
            // ],
            // [
            //     'name' => 'Menna Abdo',
            //     'email' => 'recep2@recep.com',
            //     'password' => 'menna22419',
            //     'national_ID' => '29876543212345',
            //     'role' => 'receptionist',
            //     'country' => 'Egypt',
            //     'gender' => 'female',
            // ]
        ];

        //foreach($users as $user)
        //{
        //   User::create([
        //    'name' => $user['name'],
        //    'email' => $user['email'],
        //    'password' => Hash::make($user['password'])
        //  ]);
        //}

        User::insert($users);
    }
}