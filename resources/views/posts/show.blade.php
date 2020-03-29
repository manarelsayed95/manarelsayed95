@extends('layouts.app')
    @section('content')
        <center>
        <div class="container mt-5">

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4>Post_Details</h4>
                    <h5 class="card-title">Title: {{$Post->title}}</h5>
                         <p class="card-text">Description:{{$Post->description}}</p>
                </div>
                </div>
        
                <div class="card mt-4" style="width: 18rem;">
                <div class="card-body">
                <h4>User_Details</h4>
                    <h5 class="card-title"> Name: {{$Post->user->name}}</h5>
                         <p class="card-text">Email: {{$Post->user->email}}</p>
                         <p class="card-text">Created-at: {{ $Post->created_at ->format('d-m-y')}}</p>
                </div>
            </div>
            
        </div>
        </center>
    @endsection