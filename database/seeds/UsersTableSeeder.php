<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Supplier;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // when re-seeding deletes the data inside a table, but not the table itself
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $supplierRole = Role::where('name', 'supplier')->first();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1'),
        ])->roles()->attach($adminRole);

        User::create([
            'name' => 'Mike Cobblestone',
            'email' => 'user@user.com',
            'password' => bcrypt('1'),
            'street_num' => 1207,
            'street' => 'Beaudesert Road',
            'suburb' => 'Acacia Ridge',
            'state' => 'QLD',
            'postcode' => 4110
        ])->roles()->attach($userRole);

        User::create([
            'name' => 'Sarah Jenson',
            'email' => 'user1@user.com',
            'password' => bcrypt('1'),
            'street_num' => 47,
            'street' => 'Mains Road',
            'suburb' => 'Sunnybank Hills',
            'state' => 'QLD',
            'postcode' => 4109
        ])->roles()->attach($userRole);

        User::create([
            'name' => 'Pizza Palace',
            'email' => 'supplier@supplier.com',
            'password' => bcrypt('1'),
        ])->roles()->attach($supplierRole);


        User::create([
            'name' => 'Big Al\'s Fish and Chips',
            'email' => 'supplier1@supplier.com',
            'password' => bcrypt('1'),
        ])->roles()->attach($supplierRole);


        // create supplier relationship

        Supplier::create([
            'is_approved' => true,
            'id' => 4,
            'user_id' => 4,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/bulk_actions_image_ef0fe67d-f00f-44ed-bacf-f1a7395e753e-w550-c8.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 5,
            'user_id' => 5,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/1536717086930-w550-a9.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 6,
            'user_id' => 6,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/69a180288bd969174ef26ad78aa0633e-w550-66.jpg',
        ]);
        Supplier::create([
            'is_approved' => false,
            'id' => 7,
            'user_id' => 7,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/bulk_actions_image_6e314a40-fb8f-4289-9fc5-0396cbf7a161-w550-d2.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 8,
            'user_id' => 8,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/ec0dc1a93ce8a8c72db344e1d7066fba-w550-52.jpg',
        ]);
        Supplier::create([
            'is_approved' => false,
            'id' => 9,
            'user_id' => 9,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/1528083548220-w550-a8.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 10,
            'user_id' => 10,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/97edd57c566f591d77f224f6e9c2c9cb-w550-4f.jpg',
        ]);
        Supplier::create([
            'is_approved' => false,
            'id' => 11,
            'user_id' => 11,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/bulk_actions_image_52adb90b-11d0-4782-8530-9343cf00279a-w550-24.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 12,
            'user_id' => 12,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/bulk_actions_image_ef0fe67d-f00f-44ed-bacf-f1a7395e753e-w550-c8.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 13,
            'user_id' => 13,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/bulk_actions_image_ef4d4b08-8b88-4dfd-ab1c-a2562030d1f4-w550-8b.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 14,
            'user_id' => 14,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/bulk_actions_image_7bd725c4-ae4e-4ef5-a738-8a1aba37c4af-w550-4d.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 15,
            'user_id' => 15,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/1530146526780-w550-05.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 16,
            'user_id' => 16,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/baf969055f58603d614f08314c4091cf-w550-26.jpg',
        ]);
        Supplier::create([
            'is_approved' => false,
            'id' => 17,
            'user_id' => 17,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/b9b6e06cc891c8f2b15efbf8e6a469ee-w550-4f.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 18,
            'user_id' => 18,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/1517984700723-w550-2e.jpg',
        ]);
        Supplier::create([
            'is_approved' => false,
            'id' => 19,
            'user_id' => 19,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/3ab7df961c7f9b66af12d36fb798e5c9-w550-72.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 20,
            'user_id' => 20,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/1522970383745-w550-dc.jpg',
        ]);
        Supplier::create([
            'is_approved' => false,
            'id' => 21,
            'user_id' => 21,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/bulk_actions_image_d410d31d-35de-4fbd-860c-2cc2ac269d3d-w550-6f.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 22,
            'user_id' => 22,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/1538098935119-w550-a3.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 23,
            'user_id' => 23,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/cff66876cb8af83d8084d22161d52f7c-w550-e6.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 24,
            'user_id' => 24,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/7678acd4a3c4769c2eff530722140a9b-w550-c5.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 25,
            'user_id' => 25,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/1539144301665-w550-38.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 26,
            'user_id' => 26,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/1528787931894-w550-dd.jpg',
        ]);
        Supplier::create([
            'is_approved' => false,
            'id' => 27,
            'user_id' => 27,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/f1774b481d0acc1f8dae36c610e61f6c-w550-ef.jpg',
        ]);
        Supplier::create([
            'is_approved' => true,
            'id' => 28,
            'user_id' => 28,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/1522970383745-w550-dc.jpg',
        ]);
        Supplier::create([
            'is_approved' => false,
            'id' => 29,
            'user_id' => 29,
            'image' => 'https://duyt4h9nfnj50.cloudfront.net/resized/1539824397571-w550-8a.jpg',
        ]);


        // id 4 - 29 for suppliers

        User::create([
            'name' => 'Couchfood (Eight Mile Plains) Powered by BP',
            'email' => 'okeefe.derek@example.com',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Couchfood (Salisbury) Powered by BP',
            'email' => 'umoore@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Subway (Eight Mile Plains)',
            'email' => 'xpfeffer@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Nando\'s (Garden City Westfield)',
            'email' => 'octavia.abbott@example.com',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Gusto\'s Gourmet Pizza',
            'email' => 'lmarquardt@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Mad Mex (Garden City)',
            'email' => 'moore.christine@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Chatime (Sunnybank Plaza Brewery)',
            'email' => 'wbeahan@example.net',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Subway The Village @ Upper Mount Gravatt',
            'email' => 'nyasia.schimmel@example.net',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Subway Coopers Plains',
            'email' => 'leone.ritchie@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Gol Gappa',
            'email' => 'freddie.carter@example.net',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Red Rooster (Coopers Plains)',
            'email' => 'west.vivienne@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => '5 Dogs Mt Gravatt',
            'email' => 'ilangosh@example.net',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Pho Hung Vietnamese Garden City',
            'email' => 'stokes.eleazar@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Sunshine Kebabs and Pizza Acacia Ridge',
            'email' => 'sandra.gutmann@example.net',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Pho Saigon',
            'email' => 'stark.daphney@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Singapore & Co Market Square',
            'email' => 'hmonahan@example.com',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Fresh One Kebabs',
            'email' => 'myrna31@example.net',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Pepperoni\'s',
            'email' => 'rod.senger@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Hanaichi Garden City (Upper Level)',
            'email' => 'santino.doyle@example.net',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Madtongsan Market Square',
            'email' => 'natalia47@example.com',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Korean Chicken',
            'email' => 'zulauf.brenna@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'OzKing Kebab',
            'email' => 'legros.henri@example.org',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Central 7 Seafood',
            'email' => 'goldner.cassidy@example.net',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);

        User::create([
            'name' => 'Wok N Toss',
            'email' => 'jast.emory@example.net',
            'password' => bcrypt('2'),
        ])->roles()->attach($supplierRole);
    }
}
