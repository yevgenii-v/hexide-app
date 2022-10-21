<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=200;$i++)
        {
            Product::create([
                'title_en'          => 'Product '.$i,
                'description_en'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'title_ua'          => 'Продукт '.$i,
                'description_ua'    => 'Немає нікого, хто любив би самий біль, хто б шукав його чи хотів би його зазнавати тільки через те, що він - біль...',
                'price'             => rand(50, 10000),
                'updated_at'        => now(),
                'created_at'        => now(),
            ]);
        }
    }
}
