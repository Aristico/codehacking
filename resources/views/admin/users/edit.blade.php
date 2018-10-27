@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>

        <div class="row">
        <div class="col-sm-3">

            <img class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->file : '/images/typ.jpg'}}" alt="">

        </div>
        <div class="col-sm-9">
            {!! Form::model($user, ['action'=>['AdminUsersController@update', $user->id], 'method' => 'patch', 'files'=>'true']) !!}
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
                   {!! Form::select('role_id', $roles, null , ['title'=>'role_id', 'class'=>'form-control'] ) !!}
                </div>
                <div class="form-group">
                   {!! Form::label('is_active', 'Status:') !!}
                   {!! Form::select('is_active', [1=>'Active', 0=>'Not Active'], null , ['title'=>'is_active', 'class'=>'form-control'] ) !!}
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
                   {!! Form::submit('Edit User', ['class'=>'btn btn-primary col-sm-2 mr-5'] ) !!}
                </div>
            {!! Form::close() !!}
            <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
            {!! Form::open(['action'=>['AdminUsersController@destroy', $user->id], 'method' => 'delete']) !!}
                {{csrf_field()}}
                <div class="form-group">
                   {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-2'] ) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        @include('includes.errors')
    </div>

@endsection
