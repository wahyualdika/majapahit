<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
       $this->middleware('guest')->except('logout');
    }

    public function getLoginPage(request $request)
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'email' => 'required|email:rfc,dns',
          'password' => 'required',
      ]);
      if ($validator->fails()) {
          return redirect('/login')->withErrors($validator, 'login');
      }
      $email = $request->email;
      $password = $request->password;
      $remember = $request->remember;

      if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
          $request->session()->regenerate();
          return redirect('/profile');
      }
      return redirect('/login')->with('status', 'Data Tidak User Ditemukan');
    }

    public function getRegisterPage()
    {
      return view('authentication.register');
    }

    public function register(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'username' => 'required|email:rfc,dns',
          'name' => 'required|string|max:30',
          'password' => 'required',
      ]);

      if ($validator->fails()) {
          return redirect('/register')->withErrors($validator, 'register');
      }

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->username;
      $user->password = Hash::make($request->password);
      $user->save();

      event(new Registered($user));
      if(Auth::loginUsingId($user->id)){
        return redirect()->route('verification.notice');
      }
    }

    public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/');
    }
}
