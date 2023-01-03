<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($a=1;$a<=8;$a++){ 
            DB::table('carts')->insert([
                'product_id' => rand(1,15),
                'user_id' => rand(3,7),
                'qty' => 3,
                'sub_total' => 30000,
            ]);
            }
    }
}
