<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
                'name' => 'Ahmed Hafez',
                'email' => 'admin@admin.com',
                'password' => '12345678',
                'national_ID' => '29807247777734',
                'role' => 'admin',
                'country' => 'Egypt',
                'gender' => 'male',
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