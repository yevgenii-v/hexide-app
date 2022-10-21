<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['name_en' => 'Administrator', 'name_ua' => 'Адміністратор']);
        Role::create(['name_en' => 'User', 'name_ua' => 'Користувач']);
    }
}
