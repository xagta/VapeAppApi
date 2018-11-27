<?php

use App\Post;
use Illuminate\Database\Seeder;
use App\User ;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Post::truncate() ;

        $users=User::all()->pluck('id') ;


        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'img_url' => $faker->imageUrl(),
                'body' => $faker->text(),
                'likes' => $faker->randomNumber(3),
                'user_id'=>$faker->randomElement($users)
            ]);
        }
    }
}
