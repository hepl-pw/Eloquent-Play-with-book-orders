<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            ['name' => 'non payée'],
            ['name' => 'payée'],
            ['name' => 'disponible'],
            ['name' => 'livrée'],
            ['name' => 'archivée']
        ];
        DB::table('statuses')->insert($statuses);
    }
}
