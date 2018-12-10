<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance_CSV extends Model
{
    //Table Name
    protected $table = 'attendance_csv';
    
	//Primary Key
	public $primaryKey = 'id';
    
    //Timestamps
	public $timestamps = true;
}
