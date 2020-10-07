<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Notifications\AuthorStoryApproved;
use App\Notifications\SubscribersNotify;
use App\Story;
use App\Subscriber;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $data = array(
            'pubStoriesCount' =>$pubStoriesCount,
            'unPubStoriesCount'=>$unPubStoriesCount,
            'userCount' =>$userCount,
            'categoriesCount' =>$categoriesCount
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



}
