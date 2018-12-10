





@extends('layouts.app')

@section('content')
    <h1>Attendance</h1><br><br>

    {!! Form::open(['action' => 'AttendanceController@importData', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::file('attendance_csv')}}
        </div>

        {{Form::submit('Upload file', ['class'=>'btn btn-primary btn-block'])}} <br><br>
    {!! Form::close() !!}
@endsection


