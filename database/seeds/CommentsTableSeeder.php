<?php

use App\comment;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        comment::truncate() ;

        $users=User::all()->pluck('id') ;
        $posts=Post::all()->pluck('id') ;


        for ($i = 0; $i < 10; $i++) {
            comment::create([
                'body' => $faker->text(),
                'post_id' => $faker->randomElement($posts),
                'user_id'=>$faker->randomElement($users)
            ]);
        }
    }

}
