<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{


    public function storeEmail(Request $request){

        $request->validate([
            'email'=>['required','email','unique:subscribers']
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->get('email');
        $subscriber->save();
        return redirect()->back()->with('status','Successfully add email to get daily updates!');
    }



}
