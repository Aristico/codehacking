@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>
    {!! Form::open(['action'=>'AdminUsersController@store', 'method' => 'post', 'files'=>'true']) !!}
        {{csrf_field()}}
        <div class="form-group">
           {!! Form::label('name', 'Name:') !!}
           {!! Form::text('name', null, ['title'=>'name', 'class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
           {!! Form::label('email', 'E-Mail:') !!}
           {!! Form::email('email', null, ['title'=>'email', 'class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
           <!-- Erstes Feld => feldbezeichnung, zweites Feld Angezeigter Name -->
           {!! Form::label('role_id', 'Role:') !!}
           <!-- Im Array werden die Werte eingegeben nach dem prinzip key=>value dahinter ist der
                Standardwert. das null kann durch einen eigenen Wert ersetzt werden -->
           {!! Form::select('role_id', [''=>'Select Option'] + $roles, null , ['title'=>'role_id', 'class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
           {!! Form::label('is_active', 'Status:') !!}
           {!! Form::select('is_active', [1=>'Active', 0=>'Not Active'], 0 , ['title'=>'is_active', 'class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
           {!! Form::label('photo_id', 'File:') !!}
           {!! Form::file('photo_id', null, ['title'=>'photo_id', 'class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
           {!! Form::label('password', 'Password:') !!}
           {!! Form::password('password', ['title'=>'password', 'class'=>'form-control'] ) !!}
        </div>
        <div class="form-group">
           {!! Form::submit('Create User', ['class'=>'btn btn-primary'] ) !!}
        </div>
    {!! Form::close() !!}

    @include('includes.errors')

@endsection
