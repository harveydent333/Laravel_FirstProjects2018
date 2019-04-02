<?php

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
        DB::table('users')->insert([
           'name' =>'administrator',
           'email' =>'administrator@gmail.com',
           'password' => Hash::make('123456'),
           'remember_token' => Hash::make('123456'),
           'id_roles'=>'1'
       ]);
    }
}
