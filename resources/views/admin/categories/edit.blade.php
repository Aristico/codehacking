@extends('layouts.admin')

@section('content')
    <h1>Edit Category</h1>

    <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
    {!! Form::model($category,['action'=>['AdminCategoriesController@update', $category->id], 'method' => 'put']) !!}
        {{csrf_field()}}
        <div class="form-group">
           {!! Form::label('name', 'Category') !!}
           {!! Form::text('name', null, ['title'=>'name', 'class'=>'form-control'] ) !!}

        </div>
        <div class="form-group">
            {!! Form::submit('Edit Category', ['class'=>'btn btn-primary col-sm-2'] ) !!}
        </div>
    {!! Form::close() !!}

    <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
    {!! Form::open(['action'=>['AdminCategoriesController@destroy', $category->id], 'method' => 'delete']) !!}

        <div class="form-group">
           {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-2'] ) !!}
        </div> {{csrf_field()}}

    {!! Form::close() !!}
@endsection