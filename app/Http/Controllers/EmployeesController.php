<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('staff_id', 'asc')->get();
        
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
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
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'address' => 'required|max:191',
            'phone' => 'required|numeric|regex:/^[0-9]{10}$/',
            'mobile' => 'required|numeric|regex:/^[0-9]{10}$/',
            'nic' => array(
                'required',
                'regex:/^(\d{9}[vVxX]|[0-9]{12})$/'
            ),
            'email' => 'required|email',
            'date_of_birth' => array(
                'required',
                'regex:/^([0-9]{2,4})-([0-1][0-9])-([0-3][0-9])(?:( [0-2][0-9]):([0-5][0-9]):([0-5][0-9]))?$/'
            ),
        ]);

        // create employee
        $employee = new Employee;
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->address = $request->input('address');
        $employee->phone = $request->input('phone');
        $employee->mobile = $request->input('mobile');
        $employee->nic = $request->input('nic');
        $employee->email = $request->input('email');
        $employee->date_of_birth = $request->input('date_of_birth');
        $employee->save();
		
		return redirect('/employees')->with('success', 'Employee Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit')->with('employee', $employee);
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
			'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'address' => 'required|max:191',
            'phone' => 'required|numeric|regex:/^[0-9]{10}$/',
            'mobile' => 'required|numeric|regex:/^[0-9]{10}$/',
            'nic' => array(
                'required',
                'regex:/^(\d{9}[vVxX]|[0-9]{12})$/'
            ),
            'email' => 'required|email',
            'date_of_birth' => array(
                'required',
                'regex:/^([0-9]{2,4})-([0-1][0-9])-([0-3][0-9])(?:( [0-2][0-9]):([0-5][0-9]):([0-5][0-9]))?$/'
            ),
		]);
		
        //update post
        $employee = Employee::find($id);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->address = $request->input('address');
        $employee->phone = $request->input('phone');
        $employee->mobile = $request->input('mobile');
        $employee->nic = $request->input('nic');
        $employee->email = $request->input('email');
        $employee->date_of_birth = $request->input('date_of_birth');
        $employee->save();
		
		return redirect('/employees')->with('success', 'Employee Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee removed');
    }
}
