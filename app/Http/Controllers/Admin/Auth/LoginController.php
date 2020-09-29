<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{

//    protected function guard()
//    {
//        return Auth::guard('admin');
//    }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {



        return view('admin.admin_login');


//        return view('auth.login',[
//            'title' => 'Admin Login',
//            'loginRoute' => 'admin.login',
//            'forgotPasswordRoute' => 'admin.password.request',
//        ]);
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email' => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }

    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }

    public function login(Request $request)
    {
        $this->validator($request);

        //return $request->all();

        if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
            return redirect()
                ->intended(route('admin.home'))
                ->with('status','You are Logged in as Admin!');
        }

        //Authentication failed...
        return $this->loginFailed();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        //return back();
        //return redirect()->route('admin.login')->with('status','Admin has been logged out!');
        return redirect()
            ->route('admin.login')
            ->with('status','Admin has been logged out!');
    }
}
