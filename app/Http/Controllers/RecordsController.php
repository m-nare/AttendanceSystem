<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceRecord;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = AttendanceRecord::orderBy('created_at', 'desc')->get();
        
		return view('records.index')->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'staff_id' => 'required|max:10',
            'name' => 'required|max:191',
            'clock_in' => 'required',
            'clock_out' => 'required',
            'worked_hours' => 'required|',
            'ot_hours' => 'required|',
            'on_time' => 'required',
        ]);

        // create attendance record
        $record = new AttendanceRecord;
        $record->staff_id = $request->input('staff_id');
        $record->name = $request->input('name');
        $record->clock_in = $request->input('clock_in');
        $record->clock_out = $request->input('clock_out');
        $record->worked_hours = $request->input('worked_hours');
        $record->ot_hours = $request->input('ot_hours');
        $record->on_time = $request->input('on_time');
        $record->save();
		
		return redirect('/records')->with('success', 'Attendance Record Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = AttendanceRecord::find($id);
		return view('records.edit')->with('record', $record);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'staff_id' => 'required|max:10',
            'name' => 'required|max:191',
            'clock_in' => 'required',
            'clock_out' => 'required',
            'worked_hours' => 'required|',
            'ot_hours' => 'required|',
            'on_time' => 'required',
        ]);

        // update record
        $record = AttendanceRecord::find($id);
        $record->staff_id = $request->input('staff_id');
        $record->name = $request->input('name');
        $record->clock_in = $request->input('clock_in');
        $record->clock_out = $request->input('clock_out');
        $record->worked_hours = $request->input('worked_hours');
        $record->ot_hours = $request->input('ot_hours');
        $record->on_time = $request->input('on_time');
        $record->save();
		
		return redirect('/records')->with('success', 'Attendance Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$record = AttendanceRecord::find($id);
		$record->delete();
		return redirect('/records')->with('success', 'Attendance Record Removed');
    }
}
