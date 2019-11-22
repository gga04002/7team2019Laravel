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
            'name' => 'SM_ADMIN',
            'email' => 'SM@naver.com',
            'password' => bcrypt('password'),
        ]);

        App\Admin::create([
            'name' => 'SM_ADMIN',
            'email' => 'SM@naver.com',
        ]);
    }
}
