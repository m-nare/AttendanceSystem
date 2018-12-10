<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(){
        return view('attendance.index');
    }

    public function store(Request $request){

    }

    public function importData(Request $request)
    {

        $this->validate($request, [
            'attendance_csv' => 'required|file|max:2048',
        ]);

        $fileName = "attendance".time().'.'.request()->attendance_csv->getClientOriginalExtension();

        $request->attendance_csv->storeAs('public/attendance', $fileName);

        return redirect('/attendance')->with('success', 'File Uploaded');

       
    }
}
