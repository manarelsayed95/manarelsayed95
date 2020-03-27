<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{   public function index(){
        $myPosts=[
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

        return view('index',[
            'myPostsKey'=>$myPosts,
        ]);
        }
}
