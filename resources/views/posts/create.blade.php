@extends('layouts.app')
    @section('content')
    <center>
        <div class="container mt-5">
            <form method="POST" action="{{route('Posts.store')}}">
              @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Post-Title</label>
                    <input name="title" type="text" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Post-description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Post-creator</label>
                    <select name="createdBy" class="form-control">
                    @foreach ($Posts as $post)
                        <option>{{$post['createdBy']}}</option>
                    @endforeach
                    </select>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </center>

    @endsection