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
            <form method="POST" action= '{{$action}}'>
                @if(isset($Post))
                    @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Post-Title</label>
                    @if(isset($Post))
                        <input name="title" type="text" class="form-control  @error('title') is-invalid @enderror" value="{{ $Post->title }}" id="title">
                    @else
                        <input name="title" type="text" class="form-control  @error('title') is-invalid @enderror" id="title">
                    @endif
                    <!-- alert validation message -->
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Post-description</label>
                    @if(isset($Post))
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"  id="exampleFormControlTextarea1" rows="5">{{$Post->description}}</textarea>
                    @else
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5"></textarea>
                    @endif
                    <!-- alert validation message -->
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Post-creator</label>
                    <select name="user_id" class="form-control">
                   
                        @if(isset($Post))
                            <option value="{{$Post->user->id}}">{{$Post->user->name}}</option>
                            @foreach ($users as $user)
                                @if ($user->name === $Post->user->name )
                                    <option value="{{$user->id}}" hidden> {{$user->name}}</option>
                                @else
                                    <option value="{{$user->id}}"> {{$user->name}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        @endif
                   
                    </select>
                </div>
                
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </center>

    @endsection