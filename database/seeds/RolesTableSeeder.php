<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // when re-seeding deletes the data inside a table, but not the table itself
        Role::truncate();

        Role::create(['title' => 'admin']);
        Role::create(['title' => 'user']);
    }
}
