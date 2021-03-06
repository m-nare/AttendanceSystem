





@extends('layouts.app')

@section('content')
    <h1 class="text-center">Uploads</h1><br><br>

        <div class="row justify-content-md-center">
            <div class="col-sm-6">
                <h3>Upload File</h3><hr><br>
                {!! Form::open(['action' => 'AttendanceController@upload', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::file('attendance_csv')}}
                    </div>

                    {{Form::submit('Upload file', ['class'=>'btn btn-primary btn-block'])}} <br><br>
                {!! Form::close() !!}
            </div>
        </div>
        <br><br>

        <div class="row justify-content-md-center">
            <div class="col-sm-6">
                <h3>Import from Uploaded files</h3><hr><br>
                
                @if(count($attendance_csvs)>0)
                    @foreach($attendance_csvs as $attendance_csv)
                        <a href="/attendance/{{ $attendance_csv->file_name }}/import">{{ $attendance_csv->file_name }}</a>
                        <br>

                        {!!Form::open(['action' => ['AttendanceController@destroy', $attendance_csv->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete upload', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!} 
                        <hr><br>
                    @endforeach
                    <br><br>
                @else
                    <p>No uploads to display</p>
                @endif

            </div>
        </div>

    
@endsection


