



@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">
        <div class="col-sm-6">
                <h1>Edit Employee</h1><br><br>

                {!! Form::open(['action' => ['EmployeesController@update', $employee->staff_id], 'method' => 'POST' ]) !!}
                <div class="form-group">
                    {{ Form::label('first_name', 'First Name:') }}
                    {{Form::text('first_name', $employee->first_name, ['class' => 'form-control', 'placeholder' => 'add first name'])}}
        
                </div>
                <div class="form-group">
                    {{Form::label('last_name', 'Last Name:')}}
                    {{Form::text('last_name', $employee->last_name, ['class' => 'form-control', 'placeholder' => 'add last name...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('address', 'Address:')}}
                    {{Form::text('address', $employee->address, ['class' => 'form-control', 'placeholder' => 'add address...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('phone', 'Phone:')}}
                    {{Form::text('phone', $employee->phone, ['class' => 'form-control', 'placeholder' => 'add phone number...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('mobile', 'Mobile:')}}
                    {{Form::text('mobile', $employee->mobile, ['class' => 'form-control', 'placeholder' => 'add mobile number...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('nic', 'NIC:')}}
                    {{Form::text('nic', $employee->nic, ['class' => 'form-control', 'placeholder' => 'add nic...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email:')}}
                    {{Form::text('email', $employee->email, ['class' => 'form-control', 'placeholder' => 'add email...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('date_of_birth', 'Date of Birth:')}}
                    {{Form::text('date_of_birth', $employee->date_of_birth, ['class' => 'form-control', 'placeholder' => '2000-12-31'])}}
                </div>
                <br>

                {{Form::hidden('_method','PUT')}} 
        
                {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}} <br><br>
            {!! Form::close() !!}
        </div>

    </div>

@endsection