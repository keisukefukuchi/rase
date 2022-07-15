<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('11111111'),
            'role' => 1
        ];
        User::create($admin);

        $representative = [
            'name' => 'representative',
            'email' => 'representative@representative.com',
            'password' => Hash::make('11111111'),
            'role' => 2
        ];
        User::create($representative);

        $user = [
            'name' => 'test1',
            'email' => 'test1@test1.com',
            'password' => Hash::make('11111111'),
            'role' => 3
        ];
        User::create($user);

        User::factory()->count(10)->create();
    }
}
