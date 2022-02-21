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
                'password' => '123456',
                'national_ID' => '29807241233356',
                'role' => 'admin',
                'country' => 'Egypt',
                'gender' => 'male',
            ],
            [
                'name' => 'Moaaz Hafez',
                'email' => 'manager1@manager.com',
                'password' => '123567',
                'national_ID' => '30027241230021',
                'role' => 'manager',
                'country' => 'Egypt',
                'gender' => 'male',
            ],
            [
                'name' => 'Noha Ahmed',
                'email' => 'manager2@manager.com',
                'password' => '22455678',
                'national_ID' => '27904221288877',
                'role' => 'manager',
                'country' => 'Egypt',
                'gender' => 'female',
            ],
            [
                'name' => 'Amr Ahmed',
                'email' => 'recep1@recep.com',
                'password' => 'amr12345',
                'national_ID' => '12345678901234',
                'role' => 'receptionist',
                'country' => 'Egypt',
                'gender' => 'male',
            ],
            [
                'name' => 'Menna Abdo',
                'email' => 'recep2@recep.com',
                'password' => 'menna22419',
                'national_ID' => '29876543212345',
                'role' => 'receptionist',
                'country' => 'Egypt',
                'gender' => 'female',
            ]
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