<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{

    public function fetchAllSubscriber(){
      $subscribers = Subscriber::latest()->paginate(5);
      return view('admin.admin_subscribers',compact('subscribers'))
          ->with('i', (request()->input('page', 1) - 1) * 5);;

    }

    public function removeSubscriber($id){
        Subscriber::findOrFail($id)->delete();
        return redirect()->back()->with('status1','remove subscriber');
    }

}
