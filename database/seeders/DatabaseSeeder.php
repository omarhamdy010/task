<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::factory(10)->create();

        User::create([
            'name' => 'omar',
            'email' => 'omar@omar.com',
            'password' => Hash::make('omar@omar.com'),
            'is_admin' => 1,
            'balance' => 1000
        ]);

        $user = User::select('id')->get();

        for ($i = 0; $i <= 100; $i++) {

            $data = [];

            for ($y = 0; $y <= 5000; $y++) {

                $data[] = [

                    'amount' => random_int(1, 200),
                    'from' => $user->random()->id,
                    'user_id' => $user->random()->id,
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                ];
            }

            $arr = array_chunk($data, 1000);
            foreach ($arr as $chunk) {
                Transaction::insert($chunk);
            }
        }

    }
}
