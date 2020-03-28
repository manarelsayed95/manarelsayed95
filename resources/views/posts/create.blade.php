@extends('layouts.app')
    @section('content')

    <!-- @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif -->

    <center>
        <div class="container mt-5">
            <form method="POST" action="{{route('Posts.store')}}">
              @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">Post-Title</label>
                    <input name="title" type="text" class="form-control  @error('title') is-invalid @enderror" id="title">
                    <!-- alert validation message -->
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Post-description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5"></textarea>

                    <!-- alert validation message -->
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Post-creator</label>
                    <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                    </select>
                </div>
                
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </center>

    @endsection