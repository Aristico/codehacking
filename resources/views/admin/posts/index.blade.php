@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    @if(session()->has('success_message'))
        <div class="alert alert-success">{{session('success_message')}}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Edited</th>
            </tr>
        </thead>
        <tbody>

            @if(count($posts)>0)
                @foreach($posts as $post)
                    <tr>
                        <td> {{$post->id}} </td>
                        <td> <img height="50px" src="{{$post->photo ? $post->photo->file : '/images/typ.jpg' }}"></td>
                        <td> {{$post->user->name}} </td>
                        <td> {{$post->category ? $post->category->name : 'no category'}} </td>
                        <td> <a href="{{route('posts.edit', $post->id)}}"> {{$post->title}} </a> </td>
                        <td> {!! $post->body !!} </td>
                        <td> {{$post->created_at->diffForHumans()}} </td>
                        <td> {{$post->updated_at->diffForHumans()}} </td>
                        <td> <a href="{{route('post', $post->slug)}}"> Show Post </a></td>
                        <td> <a href="{{route('comments.show', $post->id)}}"> Show Comments </a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {{$posts->render()}}
        </div>
    </div>
@endsection