<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //カレンダーを表示
    public function showCalendar()
    {
    	return view('calendar.view');
    }
}
