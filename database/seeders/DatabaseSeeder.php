<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */


    public function run()
    {
//        $this->call(RolesTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
//        User::factory(100)->create()->each(function ($user)
//        {
//            $user->roles()->attach(Role::IS_USER);
//        });
        Product::factory(200)->create();

        Order::factory(200)->create()->each(function ($order)
        {
            $order->products()->attach(Product::all()->random()->id, ['quantity' => rand(1, 10)]);
        });
    }
}
