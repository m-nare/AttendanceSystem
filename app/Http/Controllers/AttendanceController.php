<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance_CSV;

class AttendanceController extends Controller
{
    public function index(){
        $attendance_csvs = Attendance_CSV::orderBy('created_at', 'desc')->get();

        return view('attendance.index')->with('attendance_csvs', $attendance_csvs);
    }

    public function store(Request $request){

    }

    public function upload(Request $request)
    {

        $this->validate($request, [
            'attendance_csv' => 'required|file|max:2048',
        ]);

        /*
        $extension = request()->attendance_csv->getClientOriginalExtension();

        if(!$extension == 'csv'){
            return redirect('/attendance')->with('error', 'File has to be of type csv');
        }
        */

        $fileName = "attendance".time().'.'.request()->attendance_csv->getClientOriginalExtension();

        $request->attendance_csv->storeAs('public/attendance', $fileName);

        // add upload
        $attendance_csv = new Attendance_CSV;
        $attendance_csv->file_name = $fileName;
        $attendance_csv->save();    

        return redirect('/attendance')->with('success', 'File Uploaded');

       
    }
}
