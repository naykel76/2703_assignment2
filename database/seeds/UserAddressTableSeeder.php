<?php

use Illuminate\Database\Seeder;
use App\Address;

class UserAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'user_id' => 2,
            'street_num' => 47,
            'street' => 'Mains Road',
            'suburb' => 'Sunnybank Hills',
            'state' => 'QLD',
            'postcode' => 4109
        ]);
    }
}
