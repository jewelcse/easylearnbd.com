<?php

namespace App\Http\Controllers;

use App\Story;
use App\User;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowStoryController extends Controller
{

    public function fetchSingleStory($slug){

        //return $slug;
        $story = Story::where('slug', $slug)->first();
        //$story->increment('views_count') // doesnt work
        $story->views_count = $story->views_count+1;
        $story->save();
        //return $story->views_count;

        $relStories = Story::where('category_id',$story->category_id)
            ->where('id', '!=', $story->id)->limit(3)->get();;


        return view('story',compact('story','relStories'));
    }

    public function authorStories($slug){
        // $stories = Story::all()->where('is_published',1);
//        dd($stories);

        //return $slug;
        $stories = User::where('slug', $slug)->first()->stories()->where('is_published',1)->get();
        $author = User::where('slug', $slug)->first();
        return view('stories.author')
            ->with('stories',$stories)
            ->with('author',$author);

    }

    public function authorStory($aslug,$sslug){
        //dd($aid,$sid);

        $story = Story::where('slug', $sslug)->first();
        //$author = User::findOrFail($aid);

        //$data = ['story','author'];
        $relStories = Story::where('category_id',$story->category_id)
            ->where('id', '!=', $story->id)->limit(3)->get();

        return view('stories.author_single_story',compact('story','relStories'));
//        return view('stories.author_single_story')
//            ->with('story',$story)
//            ->with('author',$author);

    }
}
