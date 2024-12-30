<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('domains')->insert([
            [
                'name' => 'adolls.com',
                'status' => 'Listed',
                'lease_to_own' => false,
                'buy_now_price' => 12650,
                'floor_price' => 5000,
                'minimum_offer' => 5000,
                'sale_lander' => 'Request Price',
                'views' => 0,
            ],
            [
                'name' => 'bostonsun.com',
                'status' => 'Listed',
                'lease_to_own' => true,
                'buy_now_price' => 899,
                'floor_price' => 300,
                'minimum_offer' => 300,
                'sale_lander' => 'Request Price',
                'views' => 0,
            ],
            // Add other rows as needed...
        ]);
    }
}
