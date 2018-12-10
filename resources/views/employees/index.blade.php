@extends('layouts.app')

@section('content')
    <h1>Employees</h1><br><br>

    @if(count($employees)>0)
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Mobile</th>
                <th scope="col">NIC</th>
                <th scope="col">Email</th>
                <th scope="col">Date of Birth</th>
              </tr>
            </thead>
            <tbody>  
                   
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->staff_id}}</td>
                        <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                        <td>{{$employee->address}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->mobile}}</td>
                        <td>{{$employee->nic}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->date_of_birth}}</td>   
                        <td><a href="/employees/{{$employee->staff_id}}">More info</a></td>   
                    </tr>
                @endforeach
            <tbody>
        </table>
    @else
        <p>No employees found</p>
    @endif
@endsection