<?php

namespace App\Http\Controllers;

use App\Category;
use App\Story;
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

        $featureStories = array();
        foreach ($stories as $story){
           $featureStories[$story->id]= ceil((($story->views_count)*ceil(str_word_count($story->body)/200))%100);
        }

        arsort($featureStories);

        $newarray = array_slice($featureStories, 0, 3) ;

        foreach ($newarray as $key => $value1){

            echo "key=".$key."value=".$value1."<br>";
        }

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


}
