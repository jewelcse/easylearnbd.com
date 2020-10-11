<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Category;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Notifications\AuthorStoryApproved;
use App\Notifications\NewAuthorStory;
use App\Notifications\ReplyContactNotify;
use App\Notifications\SubscribersNotify;
use App\Story;
use App\Subscriber;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $pubStoriesCount = Story::where('is_published',1)->count();
        $unPubStoriesCount = Story::where('is_published',0)->count();
        $userCount = User::all()->count();
        $categoriesCount = Category::all()->count();

//        $notifications = Admin::find(1)->notifications;
//        $count = $notifications->count();

        $data = array(
            'pubStoriesCount' =>$pubStoriesCount,
            'unPubStoriesCount'=>$unPubStoriesCount,
            'userCount' =>$userCount,
            'categoriesCount' =>$categoriesCount,
        );

        //return $data;
        return view('admin.admin_index',compact('data'));
    }

    public function findAllUsers(){
        $users = User::latest()->paginate(5);
        return view('admin.admin_users',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function deleteUser($id){

        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('status1','Remove user success');

    }

    public function userProfile($id){

        $user = User::findOrFail($id);

        return view('admin.admin_user_profile',compact('user'));
    }

    public function allStories(){
        $stories = Story::latest()->paginate(5);
        return view('admin.admin_stories',compact('stories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

//    public function storyPublishedAction(Request $request){
//
//        $storyId = $request->sid;
//        $status  = $request->status;
//
//        $story = Story::findOrFail($storyId);
//        $story->is_published = $status;
//        $story->published_at = Carbon::now();
//        $story->save();
//
//       return response()
//            ->json(['status' => $story->is_published]);
//
//
//    }
//    public function storyPublishedAction($id)
//    {
//
//        $story = Story::findOrFail($id);
//        $story->is_published = 1;
//        $story->published_at = Carbon::now();
//        $story->save();
//        return back();
//    }

    public function storyPublishedAction(Request $request){

        //return $request->all();
        $subscribers = Subscriber::all();
        $story = Story::findOrFail($request->get('story_id'));
        $story->category_id = $request->get('category_id');
        $story->is_published = $request->get('is_published');
        $story->seo_description = $request->get('seo_description');
        $story->seo_keywords = $request->get('seo_keywords');
        $story->published_at = Carbon::now();
        //return $story;
        $story->save();
        $story->user->notify(new AuthorStoryApproved($story));


        foreach ($subscribers as $subscriber){
            Notification::route('mail',$subscriber->email)
            ->notify(new SubscribersNotify($story));
        }
        return back()->with('status','Update Status');;
//        return view('admin.admin_stories')
//            ->with('status','Successfully Published');
    }

    public function reviewStory($id){
        $story = Story::findOrFail($id);
        if ($story->is_published == 0){
            $story->is_published = -2;
            $story->save();
        }
        $categories = Category::all();
        return view('admin.admin_story_review')
            ->with('story',$story)
            ->with('categories',$categories);
    }

    public function contactList(){
        $contactLists = Contact::latest()->paginate(5);
        return view('admin.contact-list',compact('contactLists'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function contactRemove($id){
        Contact::findOrFail($id)->delete();
        return back()->with('status','remove success');
    }

    public function contactView($id){
        $contact = Contact::findOrFail($id);
        return view('admin.contact-view',compact('contact'));
    }

    public function contactReply($id){
        $contact = Contact::findOrFail($id);
        return view('admin.contact-reply',compact('contact'));
    }

    public function contactReplyAction(Request $request){

       // return $request->all();

//        Notification::route('mail',$request->to_email)
//            ->notify(new ReplyContactNotify($request));

        //notify(new ReplyContactNotify($request));

//        Notification::route('mail', $request->get('to_email'))
//            ->notify(new ReplyContactNotify($request));
        //Notification::send($request->get('to_email'),new ReplyContactNotify($request));

        return back()->with('status','replied success');

    }

    public function getNotificationCount(){
        $notifications = Admin::find(1)->notifications;
        $count = $notifications->count();
        return response()->json(['count'=>$count]);
    }

    public function getNotifications(){

        //$notifications = Admin::find(1)->notifications;
        $notifications = Admin::find(1)->unreadNotifications;

        $count = $notifications->count();

        //return $notifications;
        $html = '';

        if ($count == 0){
            $html .='
                <a class="text-center dropdown-item small text-gray-500" href="#">There is no Notifications</a></div>
                ';
        }

        
        foreach ($notifications as $notification){
            //echo $notification->id;
           // $html .= '<p>New post Need to approved</p>';

            if($notification->type == 'App\Notifications\NewSubscriber'){
                $html .='

            <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="mr-3">
                                            <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                        </div>
                                        <div><span class="small text-gray-500">'.$notification->created_at.'</span>
                                            <p>A new Subscriber</p>
                                        </div>
            </a>

';

            }elseif($notification->type == 'App\Notifications\NewAuthorStory'){
                $html .='

            <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="mr-3">
                                            <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                        </div>
                                        <div><span class="small text-gray-500">'.$notification->created_at.'</span>
                                            <p>A new stroy, need to approve</p>
                                        </div>
            </a>

';

            }

            $notifications->markAsRead();



//            $html .='
//
//            <a class="d-flex align-items-center dropdown-item" href="#">
//                                        <div class="mr-3">
//                                            <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
//                                        </div>
//                                        <div><span class="small text-gray-500">'.$notification->created_at.'</span>
//                                            <p>A new stroy, need to approve</p>
//                                        </div>
//            </a>
//
//';
        }



//        $print_array = array();
//
//        for($i=0;$notifications.size();$i++){
//           echo $print_array[$i]=$notifications.title;
//        }
//
//        //echo json_encode($print_array);

        return response()->json(['html' => $html,'count'=>$count]);

        //return response()->json(array('html' => $html,'count'=>$count));
    }



}
