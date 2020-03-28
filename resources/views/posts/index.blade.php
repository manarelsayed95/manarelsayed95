@extends('layouts.app')
@section('content')
        <div class="container">
            <a href="{{route('Posts.create')}}" class="btn btn-success mt-5 mb-5" style="background-color:#4527a0 ; border-color:#7e57c2 ;">create post</a>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">CreatedAt</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                @foreach ($Posts as $post)
                <tbody>
                    <tr>
                    <th scope="row">{{$post['id']}}</th>
                    <td>{{$post['title']}}</td>
                    <td>{{$post['createdAt']}}</td>
                    <td><a href="{{route('Posts.show',['Post'=>$post['id']])}}" class="btn btn-primary btn-sm" style="background-color:#4527a0 ; border-color:#7e57c2 ;">view details</a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
@endsection
