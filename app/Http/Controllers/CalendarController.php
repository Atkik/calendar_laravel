<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;

class CalendarController extends Controller
{
    //スケジュール登録フォームを表示
    public function insertForm()
    {
    	return view('calendar.insertForm');
    }
    
    //スケジュール登録処理
    public function insertProcess(Request $request)
    {
    	//スケジュール登録
    	Schedule::create($request->all());
    	
    	\Session::flash('flash_message', 'スケジュールを登録しました');
    	
    	//データを取得
    	$schedules = Schedule::all();
    	return redirect(route('showCalendar'));
    }
    
    //スケジュール更新フォームを表示
    public function updateForm($id)
    {
    	//更新するスケジュールを指定
    	$schedule = Schedule::find($id);
    	if(is_null($schedule)){
    		\Session::flash('flash_message', 'データがありません');
    		return redirect(route('showCalendar'));
    	}
    	return view('calendar.updateForm', ['schedule' => $schedule]);
    }
    
    //スケジュール更新処理
    public function updateProcess(Request $request)
    {
    	//更新するスケジュールを指定
    	$schedule = Schedule::find($request->No);
    	//スケジュール更新
    	$schedule->date = $request->date;
    	$schedule->start = $request->start;
    	$schedule->end = $request->end;
    	$schedule->schedule = $request->schedule;
    	$schedule->save();
    	
    	\Session::flash('flash_message', 'スケジュールを更新しました');
    	
    	//データを取得
    	$schedules = Schedule::all();
    	return redirect(route('showCalendar'));
    }
    
    //スケジュール削除確認画面を表示
    public function deleteForm($No)
    {
    	//削除するスケジュールを指定
    	$schedule = Schedule::find($No);
    	if(is_null($schedule)){
    		\Session::flash('flash_message', 'データがありません');
    		return redirect(route('showCalendar'));
    	}
    	return view('calendar.deleteForm', ['schedule' => $schedule]);
    }
    
    //スケジュール削除処理
    public function deleteProcess(Request $request)
    {
    	//スケジュール削除
    	Schedule::destroy($request->No);
    	
    	\Session::flash('flash_message', 'スケジュールを削除しました');
    	
    	//データを取得
    	$schedules = Schedule::all();
    	return redirect(route('showCalendar'));
    }
    
    //カレンダーを表示
    public function showCalendar()
    {
		//ログインユーザ名を取得
		if(Auth::user() == null){
			$userID = null;
		} else {
			$userID = Auth::user()->userID;
		}
    	//データを取得
    	$schedules = Schedule::all();
    	
    	return view('calendar.view', ['schedules' => $schedules, 'userID' => $userID]);
    }
}
