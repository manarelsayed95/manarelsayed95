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
                'createdBy'=>'manar',
            ],
            [
                'id'=>2,
                'title'=>'second post',
                'createdAt'=>'2018-05-20',
                'createdBy'=>'mayar',
            ],
            [
                'id'=>3,
                'title'=>'third post',
                'createdAt'=>'2018-06-01',
                'createdBy'=>'marwa',
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
                    'createdBy'=>'manar',
                ],
                [
                    'id'=>2,
                    'title'=>'second post',
                    'createdAt'=>'2018-05-20',
                    'createdBy'=>'mayar',
                ],
                [
                    'id'=>3,
                    'title'=>'third post',
                    'createdAt'=>'2018-06-01',
                    'createdBy'=>'marwa',
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
            $Posts=[
                [
                    'id'=>1,
                    'title'=>'first post',
                    'createdAt'=>'2018-05-01',
                    'createdBy'=>'manar',
                ],
                [
                    'id'=>2,
                    'title'=>'second post',
                    'createdAt'=>'2018-05-20',
                    'createdBy'=>'mayar',
                ],
                [
                    'id'=>3,
                    'title'=>'third post',
                    'createdAt'=>'2018-06-01',
                    'createdBy'=>'marwa',
                ],
            ];
            return view('posts.create',[
                'Posts'=>$Posts,
            ]);
        }

        public function store(){
            $request=request();
            // function addToArray(){
                $data=['title'=>"$request->title" , 
                       'description'=>"$request->description",
                       'createdBy'=>"$request->createdBy",
                    ];
                dd($data);
            //     $Posts[]=$data;
            // }
            // POST::addToArray();
            return redirect('posts.index');
        }
}
