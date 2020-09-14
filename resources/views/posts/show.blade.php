@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{$post->title}}</h1>
    <br>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
    <div>
        <h3>{!!$post->body!!}</h3>
    </div>
    <hr>
    {{-- <small>Written by {{$users->name}}</small> --}}
    <small>Written by {{$post->user->name}}</small>
    <br>
    <small>Written at {{$post->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            
            {!!Form::close()!!}
        @endif
    @endif

@endsection