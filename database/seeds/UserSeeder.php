<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
                'name'  => 'Admin',
                'tanggal_lahir' => '111.513702',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678')
            ]
        ]);
    }
}
