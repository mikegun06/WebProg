<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ['House', 'Food', 'Camera', 'Kitchen'];
        for($a=1;$a<=16;$a++){ 
            DB::table('products')->insert([
                'name' => "Product $a",
                'category' => $category[rand(0, 3)],
                'Detail' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam quidem accusamus, sapiente autem ad doloremque recusandae sequi magnam exercitationem praesentium.",
                'price' => 10000,
                'photo' => "product-$a.jpg"
            ]);
        }
    }
}
