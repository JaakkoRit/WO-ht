<?php

use Illuminate\Database\Seeder;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create(['name' => 'admin', 'label' => 'Sites admin']);
        \App\Permission::create(['name' => 'removal', 'label' => 'Can remove things']);

        \App\Role::first()->permissions()->attach(\App\Permission::first());

        \App\Role::create(['name' => 'user', 'label' => 'Regular user']);
        \App\Permission::create(['name' => 'can-do-stuff', 'label' => 'Can do stuff']);

        \App\Role::find(2)->permissions()->attach(\App\Permission::find(2));

        \App\Role::create(['name' => 'moderator', 'label' => 'Sites moderator']);
        \App\Permission::create(['name' => 'removal', 'label' => 'Can remove things']);

        \App\Role::find(3)->permissions()->attach(\App\Permission::find(3));
    }
}
