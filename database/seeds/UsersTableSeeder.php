<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate() ;

        $faker = \Faker\Factory::create();

        $password = Hash::make('22101995');

        User::Create([
            'name'=>'xagta',
            'email'=>'xagta@hotmail.com',
            'password'=>$password
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->firstNameMale,
                'email' => $faker->email,
                'password' => $password
            ]);
        }

    }
}
