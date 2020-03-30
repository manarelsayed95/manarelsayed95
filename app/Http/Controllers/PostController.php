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

        $Posts = Post::Paginate(5);

     /*I have worked on array to test code before using database
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
        */

        return view('posts.index',[
            'Posts'=>$Posts,
        ]);
        }

        //show funtion to show one post in individual page
        public function show(){
            /*I have worked on array to test code before using database
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

            // $Post=$Posts["$PostId"];
            */

            $request=request();
            $PostId=$request->Post;
            $Post = Post::find($PostId);

         
    
            return view('posts.show',[
                'Post'=>$Post,
            ]);
        }

        //create function to get data from creatPostForm
        public function create(){

            /*I have worked on array to test code before using database
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
            */

            $users = User::all();
            $action =route('Posts.store');
            return view('posts.create',[
                'users'=> $users,
                'action'=> $action,
            ]);
        }

        //store function to get the data from form and store it into database
        public function store(PostRequest $request){

            /*I have worked on array to test code before using database
            // $request=request();
            // $data=['title'=>"$request->title" , 
            //         'description'=>"$request->description",
            //         'createdBy'=>"$request->createdBy",
            //     ];
            // dd($data);
            */


            //store the request data in the db

            Post::create([
                'title' => $request->title,
                'description' =>  $request->description,
                'user_id' =>  $request->user_id,
            ]);

            //redirect to /posts
            return redirect()->route('Posts.index');
        }

        public function destroy(){
            $request=request();
            $PostId=$request->Post;

            $deleted = Post::find($PostId)->delete();
            //redirect to /posts
            return redirect()->route('Posts.index');
        }

        public function edit(){

            $request=request();
            $PostId=$request->Post;
            $Post = Post::find($PostId);
            $users = User::all();
            $action =route('Posts.update',['Post'=>$PostId]);

            return view('posts.create',[
                'users'=> $users,
                'Post'=>$Post,
                'action'=> $action,

            ]);
        }
        public function update(PostRequest $request){
            $request=request();
            $PostId=$request->Post;
            $Post = Post::find($PostId);
            $users = User::all();
            $Post->title=$request->title;
            $Post->description=$request->description;
            $Post->user_id=$request->user_id;
            $Post->save();

            //redirect to /posts
            return redirect()->route('Posts.index');
        }
}
