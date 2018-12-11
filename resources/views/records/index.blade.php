




@extends('layouts.app')

@section('content')



@if(count($records)>0)
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Staff-ID</th>
                <th scope="col">Name</th>
                <th scope="col">Clock-In</th>
                <th scope="col">Clock-Out</th>
                <th scope="col">Worked Hours</th>
                <th scope="col">OT Hours</th>
            </tr>
            </thead>
            <tbody>  
    @foreach($records as $record)
            @if($record['on_time'] == '0')
                <tr>
                    <td>{{ $record['staff_id'] }}</td>    
                    <td>{{ $record['name'] }}</td>
                    <td>{{ $record['clock_in'] }}</td>
                    <td>{{ $record['clock_out'] }}</td>
                    <td>{{ $record['worked_hours'] }}</td>
                    <td>{{ $record['ot_hours'] }}</td>
                    <td>
                        <a href="/records/{{$record->id}}/edit" class="btn btn-primary btn-sm pull-left">Edit</a>
    
                        {!!Form::open(['action' => ['RecordsController@destroy', $record->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                        {!!Form::close()!!} 
                    </td>
                </tr>
            @else
                <tr class="table-danger">
                    <td>{{ $record['staff_id'] }}</td>    
                    <td>{{ $record['name'] }}</td>
                    <td>{{ $record['clock_in'] }}</td>
                    <td>{{ $record['clock_out'] }}</td>
                    <td>{{ $record['worked_hours'] }}</td>
                    <td>{{ $record['ot_hours'] }}</td>
                    <td>
                        <a href="/records/{{$record->id}}/edit" class="btn btn-primary btn-sm pull-left">Edit</a>

                        {!!Form::open(['action' => ['RecordsController@destroy', $record->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                        {!!Form::close()!!} 
                    </td>
                </tr>
            @endif
        
        
    @endforeach

@else
    <p>No records to display.</p>
@endif


@endsection