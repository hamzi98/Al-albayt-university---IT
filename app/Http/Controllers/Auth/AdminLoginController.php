<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    
    public function AdminPortal()
    {
      return view('Admin.login');
    }
    
    public function login(Request $request)
    {
        $message=[
            'required'=>'مطلوب'
        ];
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required',
        'password' => 'required'
      ],$message);
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect('/admin');
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }




}



