<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title' => 'user',
        ]);

        Role::create([
            'title' => 'admin',
        ]);

        \App\Models\User::factory(5)->create();

        \App\Models\User::create([
            'name' => 'Admin',
            'surname'=> 'User',
            'email' => 'admin@user.com',
            'password'=>Hash::make('useradmin'),
            'role_id' => '2'
        ]);

        $this->call([
            OrderSeeder::class,
            PartnerSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
