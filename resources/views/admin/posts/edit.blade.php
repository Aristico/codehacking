@extends('layouts.admin')

@section('content')

    <h1>Edit Post</h1>

    <div class="row">

        <div class="col-sm-3">

                <img class="img-responsive img-rounded" src="{{$post->photo ? $post->photo->file : '/images/typ.jpg'}}" alt="">

        </div>

        <div class="col-sm-9">
            <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
            {!! Form::model($post, ['action'=>['AdminPostsController@update', $post->id], 'method' => 'put', 'files'=>'true']) !!}
                {{csrf_field()}}

                <div class="form-group">
                   {!! Form::label('title', 'Title:') !!}
                   {!! Form::text('title', null, ['title'=>'title', 'class'=>'form-control'] ) !!}
                </div>

                <div class="form-group">
                   {!! Form::label('category_id', 'Category:') !!}
                   {!! Form::select('category_id',[''=>'Select Option'] + $categories,  null, ['title'=>'category_id', 'class'=>'form-control'] ) !!}
                </div>

                <div class="form-group">
                   {!! Form::label('photo_id', 'Photo:') !!}
                   {!! Form::file('photo_id', ['title'=>'photo_id', 'class'=>'form-control-file'] ) !!}
                </div>

                <div class="form-group">
                   {!! Form::label('body', 'Body:') !!}
                   {!! Form::textarea('body', null, ['title'=>'body', 'class'=>'form-control', 'rows'=>6] ) !!}
                </div>

                <div class="form-group">
                   {!! Form::submit('Edit Post', ['class'=>'btn btn-primary col-sm-3'] ) !!}
                </div>

            {!! Form::close() !!}

            <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
            {!! Form::open(['action'=>['AdminPostsController@destroy', $post->id], 'method' => 'delete']) !!}
                {{csrf_field()}}
                <div class="form-group">
                   {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-3'] ) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        @include('includes.errors')
    </div>

@endsection