<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'login' => 'Admin',
            'password' => Hash::make('123456'),
        ]);

        $user->assignRole(User::ADMIN);

        $user = User::create([
            'login' => 'User 1',
            'password' => Hash::make('123456'),
        ]);

        $user->assignRole(User::CONTENT_MANAGER);

        $user = User::create([
            'login' => 'User 2',
            'password' => Hash::make('123456'),
        ]);

        $user->assignRole(User::CONTENT_MANAGER);

        $user = User::create([
            'login' => 'User 3',
            'password' => Hash::make('123456'),
        ]);

        $user->assignRole(User::CONTENT_MANAGER);
    }
}
