<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class AdminController extends Controller
{
  public function home()
  {
    return view('home');
  }
  public function loginAdmin()
  {
      if (auth()->check()) {
          return redirect()->route('admin.home');
      }
      return view('login');
  }

  public function logoutAdmin()
  {
      auth()->logout();
      return redirect()->route('admin.login');
  }

  public function postLoginAdmin(Request $request)
  {
      $remember = $request->has('remember_me')?true:false;
      if (auth()->attempt([
          'email' => $request->email,
          'password' => $request->password
      ], $remember)) {
          return redirect()->route('admin.home');
      } 
      return redirect()->route('admin.login');

  }

}
