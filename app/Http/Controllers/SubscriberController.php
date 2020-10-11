<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use App\Notifications\NewSubscriber;
use Illuminate\Support\Facades\Notification;
use App\Admin;

class SubscriberController extends Controller
{
    public function storeEmail(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email', 'unique:subscribers']
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->get('email');
        $subscriber->save();

        $admins = Admin::all();

        Notification::send($admins,new NewSubscriber($subscriber));
        //Notification::send($admins,new($subscriber));

        return redirect()->back()->with('status','Successfully add email to get daily updates!');
    }
}
