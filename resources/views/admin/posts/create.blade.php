@extends('layouts.admin')

@section('content')

    <h1>Create Post</h1>

    <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
    {!! Form::open(['action'=>'AdminPostsController@store', 'method' => 'post', 'files'=>'true']) !!}
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
           {!! Form::submit('Create Post', ['class'=>'btn btn-primary'] ) !!}
        </div>

    {!! Form::close() !!}

    @include('includes.errors')

@endsection