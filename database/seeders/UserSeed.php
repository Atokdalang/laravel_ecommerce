<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'                => 1, // ID admin
                'username'          => 'admin',
                'email'             => 'admin@example.com',
                'password'          => bcrypt('123'),
                'remember_token'    => null,
            ],
            [
                'id'                => 2, // ID staff
                'username'          => 'staff',
                'email'             => 'staff@example.com',
                'password'          => bcrypt('123'),
                'remember_token'    => null,
            ],
        ];

        User::insert($users);
    }
}
