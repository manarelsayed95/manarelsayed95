@extends('layouts.app')
@section('content')
        <div class="container">
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
                    <td><a href="{{route('Posts.show',['Post'=>$post['id']])}}" class="btn btn-primary btn-sm">view details</a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
@endsection
