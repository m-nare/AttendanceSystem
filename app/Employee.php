<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //Table Name
	protected $table = 'employees';
    
    //Primary Key
	public $primaryKey = 'staff_id';
    
    //Timestamps
    public $timestamps = true;
    
    
    public function attendancerecord()
	{
		return $this->hasMany('App\AttendanceRecord');
	}
}



?>