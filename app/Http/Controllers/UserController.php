<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Schedule;

class UserController extends Controller
{
    //ログイン画面を表示
    public function login()
    {
    	return view('user.login');
    }

    //ログイン実行
    public function loginProcess(Request $request)
    {
        $credentials = $request->only('userID', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

    	    return redirect(route('showCalendar'))->with('login_success', 'ログインに成功しました');
        }

        return back()->with('login_error', 'ユーザー名かパスワードが間違っています');
    }

    //ログアウト実行
    public function logout()
    {
        Auth::logout();

        return redirect(route('showCalendar'))->with('logout', 'ログアウトしました');
    }

    //ユーザ登録フォームを表示
    public function registration()
    {
    	return view('user.registration');
    }
    
    //ユーザ登録処理
    public function registrationProcess(Request $request)
    {
    	//ユーザ登録
        User::create([
            'userID' => $request->userID,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);
    	
    	\Session::flash('flash_message', 'ユーザを登録しました');
    	
    	//データを取得
    	$schedules = Schedule::all();
    	return redirect(route('showCalendar'));
    }
}
