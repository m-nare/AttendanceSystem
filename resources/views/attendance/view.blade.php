



@extends('layouts.app')

@section('content')



@if(count($attendance_records)>0)
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Clock-In</th>
                <th scope="col">Clock-Out</th>
                <th scope="col">Worked Hours</th>
                <th scope="col">OT Hours</th>
            </tr>
            </thead>
            <tbody>  
    @foreach($attendance_records as $record)
        <tr>
            <td>{{ $record['name'] }}</td>
            <td>{{ $record['clock_in'] }}</td>
            <td>{{ $record['clock_out'] }}</td>
            <td>{{ $record['worked_hours'] }}</td>
            <td>{{ $record['ot_hours'] }}</td>
        </tr>
        
    @endforeach
@else
    <p>No records to display.</p>
@endif




@endsection