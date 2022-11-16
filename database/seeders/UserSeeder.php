<?php

namespace Database\Seeders;
use App\Models\User;

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
        $user = [
            [
                'id' => 1,
               'name'=>'Admin Super',
               'email'=>'ekasurya1410@gmail.com',
                'role'=>'admin_super',
               'password'=> bcrypt('admin_super'),
            ],
            [
                'id' => 2,
               'name'=>'Admin1',
               'email'=>'thesecret8008@gmail.com',
                'role'=>'admin',
               'password'=> bcrypt('admin1'),
            ],
            [
                'id' => 3,
               'name'=>'Admin2',
               'email'=>'abhinayakoperasi@gmail.com',
                'role'=>'admin',
               'password'=> bcrypt('admin2'),
            ],
            [
                'id' => 4,
               'name'=>'user1',
               'email'=>'gedepawitradi@yahoo.co.id',
                'role'=>'user',
               'password'=> bcrypt('user1'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::firstOrCreate($value);
        }
    }
}
