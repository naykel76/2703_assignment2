<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Address;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // when re-seeding deletes the data inside a table, but not the table itself
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $otherRole = Role::where('name', 'other')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1'),
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('1'),
        ]);

        $other = User::create([
            'name' => 'other',
            'email' => 'other@other.com',
            'password' => bcrypt('1'),
        ]);

        // attach role to user
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
        $other->roles()->attach($otherRole);

        // factory(App\User::class, 25)->create();

        // run the model factory and create (attach) address
        // factory(App\User::class, 50)->create()->each(function ($user) {
        //     $user->address()->save(factory(Address::class)->make());
        // });
    }
}
