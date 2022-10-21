<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $adminRole = Role::where('id', Role::IS_ADMIN)->first();
        $userRole = Role::where('id', Role::IS_USER)->first();

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'a@a.loc',
            'password'  => Hash::make('secret'),
        ]);

        $admin->roles()->attach($adminRole);

        User::create([
            'name'      => 'User',
            'email'     => 'u@u.loc',
            'password'  => Hash::make('secret'),
        ]);

        $userRole->roles()->attach($userRole);
    }
}
