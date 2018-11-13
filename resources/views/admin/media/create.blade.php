@extends('layouts.admin')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet">
@stop

@section('content')

    <h1>Media</h1>

    <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
    {!! Form::open(['action'=>'AdminMediaController@store', 'method' => 'post', 'class'=>'dropzone']) !!}
        {{csrf_field()}}

    {!! Form::close() !!}

@endsection

@section('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@endsection