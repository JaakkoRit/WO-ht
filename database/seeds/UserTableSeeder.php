<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Luodaan feikkikäyttäjät
        factory('App\User', 2)->create();

        // Luodaan "oikea" käyttäjä
        factory('App\User')->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        \App\User::find(3)->roles()->attach(\App\Role::first());
        \App\User::find(1)->roles()->attach(\App\Role::find(2));
        \App\User::find(2)->roles()->attach(\App\Role::find(3));
    }
}
