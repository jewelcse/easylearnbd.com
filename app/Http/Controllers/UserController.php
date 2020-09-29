<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userProfile(){
        $userId = Auth::user()->id;
        $user = User::find($userId);
        return view('user.profile',compact('user'));
    }

    public function updateUserProfile(Request $request){

        //$user->update($request->all());
        //dd($user);
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->bio = $request->get('bio');
        $user->save();

        return back()->with('status1','Successfully Updated! ');

    }

    public function profilePhotoUpload(Request $request)
    {

        //dd($request->file('avater'));

        $request->validate([
            'avater' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->avater->extension();

        //return $imageName;
        $request->avater->move(public_path('images'), $imageName);
        //Image::make($request->file('avater'))->resize(300,300)->move(public_path('images',$imageName));


        $user = Auth::user();
        $user->avater = $imageName;
        $user->save();

        return back();
    }

}
