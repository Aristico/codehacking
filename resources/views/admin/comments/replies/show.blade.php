@extends('layouts.admin')


@section('content')

    <h1>Replies</h1>

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

            @if(count($replies)>0)
                @foreach($replies as $reply)
                    <tr>
                        <td> {{$reply->id}} </td>
                        <td> <img width="50üx" src="{{$reply->photo ? $reply->photo : '/images/typ.jpg'}}"></td>
                        <td> {{$reply->author}} </td>
                        <td> {{$reply->body}} </td>
                        <td> {{$reply->created_at->diffForHumans()}} </td>
                        <td> {{$reply->updated_at->diffForHumans()}} </td>
                        <td><a href="{{route('post', $reply->comment->post->id)}}">View Post</a> </td>
                        <td>
                            @if($reply->is_active == 0)
                                <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
                                {!! Form::open(['action'=>['CommentRepliesController@update', $reply->id], 'method' => 'PUT']) !!}
                                    {{csrf_field()}}
                                    <input type="hidden" name="is_active" value="1">
                                    <div class="form-group">
                                       {!! Form::submit('Aprove', ['class'=>'btn btn-success'] ) !!}
                                    </div>
                                {!! Form::close() !!}
                            @else
                                <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
                                {!! Form::open(['action'=>['CommentRepliesController@update', $reply->id], 'method' => 'PUT']) !!}
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
                                {!! Form::open(['action'=>['CommentRepliesController@destroy', $reply->id], 'method' => 'DELETE']) !!}
                                    {{csrf_field()}}
                                    <div class="form-group">
                                       {!! Form::submit('Delete', ['class'=>'btn btn-danger'] ) !!}
                                    </div>
                                {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @else
                <h1>No Replies</h1>
            @endif
        </tbody>
    </table>
@endsection