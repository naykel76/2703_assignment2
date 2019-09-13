<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // when re-seeding deletes the data inside a table, but not the table itself
        User::truncate();

        $adminRole = Role::where('title', 'admin')->first();
        $userRole = Role::where('title', 'user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
        ]);

        // attach role to user
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);

        // factory(App\User::class, 25)->create();

    }
}
