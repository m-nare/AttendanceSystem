<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    //Table Name
	protected $table = 'attendance_records';
    
    //Primary Key
	public $primaryKey = 'id';
    
    //Timestamps
    public $timestamps = true;
    
    public function employee()
	{
	    return $this->belongsTo('App\Employee');
    }
}
