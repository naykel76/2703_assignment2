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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(UserAddressTableSeeder::class);


        // factory(App\Quiz::class, 5)->create();
        // factory(App\Question::class, 20)->create();

    }
}
