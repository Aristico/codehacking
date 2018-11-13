@extends('layouts.blog-post')

@section('content')

    @if(session('message_text'))
         <div class="alert alert-success">
            {{session('message_text')}}
         </div>
    @endif

    <h1>Post</h1>

     <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->

                {!! $post->body !!}

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->

                @if(Auth::check())
                <div class="well">
                    <h4>Leave a Comment:</h4>

                    <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
                    {!! Form::open(['action'=>'PostCommentsController@store', 'method' => 'post']) !!}
                        {{csrf_field()}}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="form-group">
                           {!! Form::label('body', 'Body', ['class'=>'sr-only']) !!}
                           {!! Form::textarea('body', null, ['title'=>'body', 'class'=>'form-control', 'rows'=>3 ] ) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::submit('Send Comment', ['class'=>'btn btn-primary'] ) !!}
                        </div>
                    {!! Form::close() !!}
                </div>

                <hr>
                @endif

                <!-- Posted Comments -->

                <!-- Comment -->

                @if(count($comments)>0)

                    @foreach($comments as $comment)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img width="64px" class="media-object" src="{{$comment->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->author}}
                                    <small>{{$comment->created_at->diffForHumans()}}</small>
                                </h4>
                                {{$comment->body}}
                                <!-- Nested Comment -->
                                @if(count($comment->replies)>0)
                                    @foreach($comment->replies as $reply)
                                        @if($reply->is_active == 1)
                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img width="64px" class="media-object" src="{{$reply->photo}}" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{$reply->author}}
                                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                                    </h4>
                                                    {{$reply->body}}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                                    {!! Form::open(['action'=>'CommentRepliesController@createReply', 'method' => 'post']) !!}
                                        {{csrf_field()}}
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                        <div class="form-group">
                                           {!! Form::label('body', 'Body', ['class'=>'sr-only']) !!}
                                           {!! Form::textarea('body', null, ['title'=>'body', 'class'=>'form-control', 'rows'=>1 ] ) !!}
                                        </div>
                                        <div class="form-group">
                                           {!! Form::submit('Send Reply', ['class'=>'btn btn-primary'] ) !!}
                                        </div>
                                    {!! Form::close() !!}
                                <!-- End Nested Comment -->
                            </div>
                        </div>
                    @endforeach

                @endif

@endsection

@section('category')

    <ul class="list-unstyled">
        <li><a href="#">{{$post->category->name}}</a>
        </li>
    </ul>

@endsection
