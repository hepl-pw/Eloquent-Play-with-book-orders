<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    public function run()
    {
        //number of status defined for each order
        $nbrStatuses = 4;

        foreach (Order::all() as $order) {
            $statusesCount = rand(1, $nbrStatuses);
            $time = Carbon::today();
            for ($i = 1; $i <= $statusesCount; $i++) {
                $time->addSecond();
                $order->statuses()->attach($i, ['created_at' => $time]);
            }
        }
    }
}
