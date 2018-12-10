





@extends('layouts.app')

@section('content')
    
    
    <div class="row justify-content-md-center">
        <div class="col-sm-6">
                <h1>Create Employee</h1><br><br>

                {!! Form::open(['action' => 'EmployeesController@store', 'method' => 'POST' ]) !!}
                <div class="form-group">
                    {{ Form::label('first_name', 'First Name:') }}
                    {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'add first name'])}}
        
                </div>
                <div class="form-group">
                    {{Form::label('last_name', 'Last Name:')}}
                    {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'add last name...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('address', 'Address:')}}
                    {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'add address...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('phone', 'Phone:')}}
                    {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'add phone number...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('mobile', 'Mobile:')}}
                    {{Form::text('mobile', '', ['class' => 'form-control', 'placeholder' => 'add mobile number...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('nic', 'NIC:')}}
                    {{Form::text('nic', '', ['class' => 'form-control', 'placeholder' => 'add nic...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email:')}}
                    {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'add email...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('date_of_birth', 'Date of Birth:')}}
                    {{Form::text('date_of_birth', '', ['class' => 'form-control', 'placeholder' => '2000-12-31'])}}
                </div>
                <br>
        
                {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}} <br><br>
            {!! Form::close() !!}
        </div>

    </div>
@endsection