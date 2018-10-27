@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">
        <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
        {!! Form::open(['action'=>'AdminCategoriesController@store', 'method' => 'post']) !!}
            {{csrf_field()}}

            <div class="form-group">
               {!! Form::label('name', 'New Category:') !!}
               {!! Form::text('name', null, ['title'=>'name', 'class'=>'form-control'] ) !!}
            </div>
        
            <div class="form-group">
               {!! Form::submit('Create Category', ['class'=>'btn btn-primary'] ) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('categories.edit', $category->id)}}"> {{$category->name}}</a></td>
                            <td>{{$category->created_at !== null ? $category->created_at->diffForHumans() : 'no date'}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


@endsection