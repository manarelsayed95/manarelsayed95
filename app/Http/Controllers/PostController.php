<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{  
    public function index(){
         $Posts=[
            [
                'id'=>1,
                'title'=>'first post',
                'createdAt'=>'2018-05-01',
            ],
            [
                'id'=>2,
                'title'=>'second post',
                'createdAt'=>'2018-05-20',
            ],
            [
                'id'=>3,
                'title'=>'third post',
                'createdAt'=>'2018-06-01',
            ],
        ];
        return view('posts.index',[
            'Posts'=>$Posts,
        ]);
        }

        public function show(){
            $Posts=[
                [
                    'id'=>1,
                    'title'=>'first post',
                    'createdAt'=>'2018-05-01',
                ],
                [
                    'id'=>2,
                    'title'=>'second post',
                    'createdAt'=>'2018-05-20',
                ],
                [
                    'id'=>3,
                    'title'=>'third post',
                    'createdAt'=>'2018-06-01',
                ],
            ];
            $request=request();
            $PostId=$request->Post;
            $Post=$Posts["$PostId"];
    
            return view('posts.show',[
                'Post'=>$Post,
            ]);
        }

        public function create(){
            return view('posts.create');
        }

        public function store(){
            $request=request();
            // function addToArray(){
                $data=['title'=>"$request->title" , 'description'=>"$request->description"];
                dd($data);
            //     $Posts[]=$data;
            // }
            // POST::addToArray();
            return redirect('posts.index');
        }
}
