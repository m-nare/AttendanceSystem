<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance_CSV;
use League\Csv\Reader;
use League\Csv\Statement;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(){
        $attendance_csvs = Attendance_CSV::orderBy('created_at', 'desc')->get();

        return view('attendance.index')->with('attendance_csvs', $attendance_csvs);
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

    public function import($file_name)
    {
        
        // get csv result set
        $reader = Reader::createFromPath('../storage/app/public/attendance/'.$file_name, 'r');
        $reader->setHeaderOffset(0);
        $records = (new Statement())->process($reader);
        $records->getHeader();     
        

        foreach ($records as $record) {
            
            // worked hours calculation
            $parts = explode(".", $record['clock-in']);
            $start_seconds = (int) $parts[0] * 3600 + (int) $parts[1] * 60 ;

            $parts = explode(".", $record['clock-out']);
            $finish_seconds = (int) $parts[0] * 3600 + (int) $parts[1] * 60 ;

            $worked_seconds = $finish_seconds - $start_seconds;
            $worked_hours = round($worked_seconds / 3600, 2) ;
            $worked_hours_string = sprintf("%.2f", $worked_hours); 

            // OT Calculation
            $ot_start = (17 * 3600) + (30 * 60);
            $ot_end = (3600 * 19);
            if($finish_seconds > $ot_start){
                $ot_seconds = $finish_seconds - $ot_start;
                $ot_hours = round($ot_seconds / 3600, 2);
                $ot_hours_string = sprintf("%.2f", $ot_hours);
            }
            else{
                $ot_hours_string = '0';
            }

            //$record['worked_hours'] = $worked_hours_string;

            $attendance_records[] = [ "staff_id" => $record['Staff-ID'],
                                      "name" => $record['name'],
                                      "clock_in" => $record['clock-in'],
                                      "clock_out" => $record['clock-out'],
                                      "worked_hours" => $worked_hours_string,
                                      "ot_hours" => $ot_hours_string
                                    ];
        }   

        
        return view('attendance.view')->with('attendance_records', $attendance_records);
    }
}
