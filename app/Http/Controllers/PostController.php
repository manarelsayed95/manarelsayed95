<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{  

    //index function to show all posts in table 
    public function index(){

        $Posts = Post::all();

        //  $Posts=[
        //     [
        //         'id'=>1,
        //         'title'=>'first post',
        //         'createdAt'=>'2018-05-01',
        //         'createdBy'=>'manar',
        //     ],
        //     [
        //         'id'=>2,
        //         'title'=>'second post',
        //         'createdAt'=>'2018-05-20',
        //         'createdBy'=>'mayar',
        //     ],
        //     [
        //         'id'=>3,
        //         'title'=>'third post',
        //         'createdAt'=>'2018-06-01',
        //         'createdBy'=>'marwa',
        //     ],
        // ];

        return view('posts.index',[
            'Posts'=>$Posts,
        ]);
        }

        //show funtion to show one post in individual page
        public function show(){

            // $Posts=[
            //     [
            //         'id'=>1,
            //         'title'=>'first post',
            //         'createdAt'=>'2018-05-01',
            //         'createdBy'=>'manar',
            //     ],
            //     [
            //         'id'=>2,
            //         'title'=>'second post',
            //         'createdAt'=>'2018-05-20',
            //         'createdBy'=>'mayar',
            //     ],
            //     [
            //         'id'=>3,
            //         'title'=>'third post',
            //         'createdAt'=>'2018-06-01',
            //         'createdBy'=>'marwa',
            //     ],
            // ];

            $request=request();
            $PostId=$request->Post;
            $Post = Post::find($PostId);

            // $Post=$Posts["$PostId"];
    
            return view('posts.show',[
                'Post'=>$Post,
            ]);
        }

        //create function to get data from creatPostForm
        public function create(){
            // $Posts=[
            //     [
            //         'id'=>1,
            //         'title'=>'first post',
            //         'createdAt'=>'2018-05-01',
            //         'createdBy'=>'manar',
            //     ],
            //     [
            //         'id'=>2,
            //         'title'=>'second post',
            //         'createdAt'=>'2018-05-20',
            //         'createdBy'=>'mayar',
            //     ],
            //     [
            //         'id'=>3,
            //         'title'=>'third post',
            //         'createdAt'=>'2018-06-01',
            //         'createdBy'=>'marwa',
            //     ],
            // ];

            $users = User::all();

            return view('posts.create',[
                'users'=> $users,
            ]);
        }

        //store function to get the data from form and store it into database
        public function store(PostRequest $request){
            // $request=request();
 
            // $data=['title'=>"$request->title" , 
            //         'description'=>"$request->description",
            //         'createdBy'=>"$request->createdBy",
            //     ];
            // dd($data);

            //store the request data in the db

            Post::create([
                'title' => $request->title,
                'description' =>  $request->description,
                'user_id' =>  $request->user_id,
            ]);

            //redirect to /posts
            return redirect('posts.index');
        }
}
