





@extends('layouts.app')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-sm-6">
            <h1 class="text-center">Create Attendance Record</h1><br><br>
            
            {!! Form::open(['action' => 'RecordsController@store', 'method' => 'POST' ]) !!}
                <div class="form-group">
                    {{Form::label('staff_id', 'Staff ID')}}
                    {{Form::text('staff_id', '', ['class' => 'form-control', 'placeholder' => 'add staff_id'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'add name'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('clock_in', 'Clock In') }}
                    {{Form::text('clock_in', '', ['class' => 'form-control', 'placeholder' => '2000-01-01 00:00:00'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('clock_out', 'Clock Out') }}
                    {{Form::text('clock_out', '', ['class' => 'form-control', 'placeholder' => '2000-01-01 00:00:00'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('worked_hours', 'Worked Hours') }}
                    {{Form::text('worked_hours', '', ['class' => 'form-control', 'placeholder' => 'add worked hours'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('ot_hours', 'OT Hours') }}
                    {{Form::text('ot_hours', '', ['class' => 'form-control', 'placeholder' => 'add ot hours'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('on_time', 'On Time') }}
                    {{ Form::select('on_time', ['0' => 'True', '1' => 'False'], '0') }}
                </div>
                <br>

                {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}}
                <br><br>
            {!! Form::close() !!}
        </div>
    </div>        
@endsection