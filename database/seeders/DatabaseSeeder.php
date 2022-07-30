<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        User::create([
            'name' => 'omar',
            'email' => 'omar@omar.com',
            'password' => Hash::make('omar@omar.com'),
            'is_admin' => 1,
            'balance'=>1000
        ]);
    }
}
