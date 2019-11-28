<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'ADMIN',
            'email' => 'root@php.com',
            'password' => bcrypt('password'),
        ]);

        App\Admin::create([
            'name' => 'ADMIN',
            'email' => 'root@php.com',
        ]);
    }
}
