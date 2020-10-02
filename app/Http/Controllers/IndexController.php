<?php

namespace App\Http\Controllers;

use App\Category;
use App\Story;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\Tagged;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Element\Strong;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stories = Story::where('is_published',1)->get();
        $categories = Category::all();

//        $featureStories = array();
//        foreach ($stories as $story){
//           $featureStories[$story->id]= ceil((($story->views_count)*ceil(str_word_count($story->body)/200))%100);
//        }
//
//        arsort($featureStories);
//
//        $newarray = array_slice($featureStories, 0, 3) ;
//
//        foreach ($newarray as $key => $value1){
//
//            echo "key=".$key."value=".$value1."<br>";
//        }

//        foreach ($featureStories as $key=>$value){
//            echo 'key='.$key . ' value='. $value."<br>";
//        }
        //echo $newArray = array_slice($featureStories, 0, 2, true);


//        $data = array(
//          'stories'=>$stories,
//            'categories'=>$categories
//        );



        //return view('index',compact('stories'));
        return view('index')->with('stories',$stories)->with('categories',$categories);
    }


    public function storiesByCategory($slug){

        $categories = Category::all();
        $category = Category::where('slug',$slug)->first();

        //conditions = ['is_published'=>1,'slug'=>$slug];
        $stories  = Story::where('is_published',1)
            ->where('category_id',$category->id)->get();
        //$stories  =Story::where($conditions)->get();
        //return $stories;
        return view('category_stories')
            ->with('stories',$stories)
            ->with('categories',$categories)
            ->with('category_name',$category->name);

    }

    public function search(Request $request){

        $query = $request->get('query');

        $stories = Story::where('title','LIKE',"%$query%")->where('is_published',true)->get();

        return view('search',compact('stories','query'));
    }

    public function searchByTags($tags){

       //return $stories  = Story::with([Tag::where('id',$id)])->get();

//        return $stories  =Story::with('Tag')->get();

        $stories = Story::withAllTags($tags)->get(); // finally working


//        $stories = Story::whereHas(['Tag'=> function($query) use($id){
//            $query->where('id',$id);
//        }])->get();
//        dd($stories);



        //$stories = Story::where('title','LIKE',"%$tags%")->where('body','LIKE',"%$tags%")->where('is_published',true)->get();

        return view('tags',compact('stories','tags'));
    }

    public function createStoryRules(){
        return view('rules');
    }


}
