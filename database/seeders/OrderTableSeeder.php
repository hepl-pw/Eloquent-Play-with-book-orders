<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    public function run()
    {

        foreach (User::all() as $user) {
            Order::create([
                'user_id' => $user->id
            ]);
            if (rand(0, 10) < 1) {
                Order::create([
                    'user_id' => $user->id
                ]);
            }
            if (rand(0, 100) < 1) {
                Order::create([
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
