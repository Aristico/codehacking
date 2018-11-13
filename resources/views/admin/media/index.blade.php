@extends('layouts.admin')

@section('content')

    <h1>Media</h1>


    <!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
    {!! Form::open(['action'=>'AdminMediaController@mediaDelete', 'method' => 'delete', 'class'=>'form-inline' ]) !!}
        {{csrf_field()}}

    {{--<form action="/delete/media" method="post" class="form-inline">--}}



        <select name="options">
            <option value="delete" >Delete</option>
        </select>
        <div class="form-group">
           {!! Form::submit('Submit', ['class'=>'btn btn-primary', 'name'=>'delete_all'] ) !!}
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th><input class="checkAll" type="checkbox" name="mediaSelectArray[]" value="all"></th>
                    <th>id</th>
                    <th>Photo</th>
                    <th>Created at</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
            @if($photos)
                @foreach($photos as $photo)
                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="mediaSelectArray[]" value="{{$photo->id}}"></td>
                        <td>{{$photo->id}}</td>
                        <td><img height="50px" src="{{$photo->file}}"></td>
                        <td>{{$photo->created_at}}</td>
                        <td><!-- bei Action den Controller und die Methode eintrage z.B. UserController@Create -->
                            <div class="form-group">
                                <button name="single_delete" value="{{$photo->id}}" class="btn btn-danger">Delete</button>
                            </div>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </form>



@endsection

@section('footer')

    <script>

        $('.checkAll').on('click', function () {

            if(this.checked) {

                $('.checkBoxes').each(function () {

                    this.checked = true;
                })

            } else {

                $('.checkBoxes').each(function () {

                    this.checked = false;
                })

            }
        })

    </script>

@endsection