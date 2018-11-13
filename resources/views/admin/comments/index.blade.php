@extends('layouts.admin')


@section('content')

    <h1>Comments</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Author</th>
                <th>Body</th>
                <th>Created</th>
                <th>Edited</th>
                <th>Post</th>
            </tr>
        </thead>
        <tbody>

            @if(count($comments)>0)
                @foreach($comments as $comment)
                    <tr>
                        <td> {{$comment->id}} </td>
                        <td> <img width="50üx" src="{{$comment->photo ? $comment->photo : '/images/typ.jpg'}}"></td>
                        <td> {{$comment->author}} </td>
                        <td> {{$comment->body}} </td>
                        <td> {{$comment->created_at->diffForHumans()}} </td>
                        <td> {{$comment->updated_at->diffForHumans()}} </td>
                        <td><a href="{{route('post', $comment->post->slug)}}">View Post</a> </td>
                        <td><a href="{{route('replies.show', $comment->id)}}">View Replies</a> </td>
                        <td>
                            @if($comment->is_active == 0)
                                <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
                                {!! Form::open(['action'=>['PostCommentsController@update', $comment->id], 'method' => 'PUT']) !!}
                                    {{csrf_field()}}
                                    <input type="hidden" name="is_active" value="1">
                                    <div class="form-group">
                                       {!! Form::submit('Aprove', ['class'=>'btn btn-success'] ) !!}
                                    </div>
                                {!! Form::close() !!}
                            @else
                                <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
                                {!! Form::open(['action'=>['PostCommentsController@update', $comment->id], 'method' => 'PUT']) !!}
                                    {{csrf_field()}}
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="form-group">
                                       {!! Form::submit('Unaprove', ['class'=>'btn btn-warning'] ) !!}
                                    </div>
                                {!! Form::close() !!}
                            @endif
                        </td>
                        <td>
                                <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
                                {!! Form::open(['action'=>['PostCommentsController@destroy', $comment->id], 'method' => 'DELETE']) !!}
                                    {{csrf_field()}}
                                    <div class="form-group">
                                       {!! Form::submit('Delete', ['class'=>'btn btn-danger'] ) !!}
                                    </div>
                                {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection