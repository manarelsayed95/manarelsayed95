<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Post;
use App\User;

use App\Http\Resources\PostResource;
use Illuminate\Validation\ValidationException;

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
            // Post::paginate(4)
       ); 
    }

    public function show($post){
        return  Post::find($post)
           ?new PostResource(
                Post::find($post)
            ) : 'not exist';
    }
    public function store(Request $request)
    {

        // $input = $request->all();

        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'user_name' => 'required'
        ]);

        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());       
        // }
        $username=$request->user_name;
        // dd($username);
        $userData= DB::table('users')->where('name',$username)->get();
        // dd($userData[0]->id);

       $post= Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' =>   $userData[0]->id,
        ]);
        return new PostResource($post);
        // return $this->sendResponse($post->toArray(), 'Post created successfully.');

    }
    
}
