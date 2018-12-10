








@extends('layouts.app')

@section('content')
    <a href="/employees" class="btn btn-info">Go Back</a> <br><br>

    <div class="row justify-content-md-center">
        <div class="col-sm-4 ">
                <div class="card " >
                        <div class="card-header text-white bg-primary">
                            Employee: {{ $employee->first_name }} {{$employee->last_name}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-info">Staff Id: {{$employee->staff_id}}</li>
                            <li class="list-group-item list-group-item-info">Name: {{$employee->first_name}} {{$employee->last_name}}</li>
                            <li class="list-group-item list-group-item-info">Address: {{$employee->address}}</li>
                            <li class="list-group-item list-group-item-info">Phone: {{$employee->phone}}</li>
                            <li class="list-group-item list-group-item-info">Mobile: {{$employee->mobile}}</li>
                            <li class="list-group-item list-group-item-info">NIC: {{$employee->nic}}</li>
                            <li class="list-group-item list-group-item-info">Email: {{$employee->email}}</li>
                            <li class="list-group-item list-group-item-info">Date of Birth: {{$employee->date_of_birth}}</li>
                            <li class="list-group-item list-group-item-info">
                                <a href="/employees/{{$employee->staff_id}}/edit" class="btn btn-primary btn-block">Edit Employee</a>
                                <br>

                                {!!Form::open(['action' => ['EmployeesController@destroy', $employee->staff_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete Employee', ['class' => 'btn btn-danger btn-block'])}}
                                {!!Form::close()!!} 
                                
                            </li>    
                        </ul>
                        <br><br>
                </div>
        </div>
    </div>
    

@endsection