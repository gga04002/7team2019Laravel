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
        // admin 계정 시더
        App\User::create([
            'name' => 'ADMIN',
            'email' => 'root@php.com',
            'password' => bcrypt('password'),
            'admin'=>1,
        ]);

        // factory(App\User::class)->

    }
}
