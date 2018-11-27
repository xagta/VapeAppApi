<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Storage ;
use Illuminate\Http\UploadedFile ;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts=Post::with('comments','user')->orderBy('created_at','desc')->get();
		 return response()->json($posts,200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) ; 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $faker = \Faker\Factory::create();

     $name = $faker->imageUrl();

        $files = $request->file('file');
        if (!empty($files))
        {

          $name = 'local'.time().$files->getClientOriginalName();


              // var_dump($name);
              $image_name =  $files->storePubliclyAs('public/images',$name) ;
        }



        $post =  Post::create([
            'body' => $request->body,
            'user_id'=>$request->user_id,
            'img_url'=> $name,
        ]);

       // var_dump($post) ;
  return response()->json($post, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id) ;
        return response()->json($post, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all()) ;
        return response()->json($post, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id) ;
        $post->delete() ;
    }
}
