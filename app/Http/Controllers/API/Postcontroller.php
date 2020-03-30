<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\User;

use App\Http\Resources\PostResource;

class Postcontroller extends Controller
{
    //get all posts from database
    public function index(){

    //    get the model object of Post
    //    dd(Post::all());
    //    use the transformation layer
    //   return the result of transformation layer
       return PostResource::collection(
            Post::all()
       ); 
    }

    public function show($post){
        return  Post::find($post) ?
            new PostResource(
                Post::find($post)
            ) : 'not exist';
    }
}
