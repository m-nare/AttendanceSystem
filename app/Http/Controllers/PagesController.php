<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to the Attendance system!';

        return view('pages.index')->with('title', $title);;
    }

    public function about(){
        $title = 'About app';

		return view('pages.about')->with('title', $title);
	}
	
}



