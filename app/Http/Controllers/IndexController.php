<?php

namespace App\Http\Controllers;

use App\Category;
use App\Story;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\Tagged;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Element\Strong;
use Artesaos\SEOTools\Facades\SEOTools;
class IndexController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        SEOTools::setTitle('Home');
        SEOTools::setDescription('This is my page description');

        $feaStories  = Story::inRandomOrder()->limit(4)->get();
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
        return view('index')->with('stories',$stories)
            ->with('categories',$categories)
            ->with('featureStories',$feaStories);
    }


    public function storiesByCategory($slug){

        SEOTools::setTitle($slug);
        $categories = Category::all();
        $category = Category::where('slug',$slug)->first();
        $stories  = Story::where('is_published',1)
            ->where('category_id',$category->id)->get();
        return view('category_stories')
            ->with('stories',$stories)
            ->with('categories',$categories)
            ->with('category_name',$category->name);

    }

    public function search(Request $request){

        SEOTools::setTitle($request->get('query'));
        $query = $request->get('query');
        $stories = Story::where('title','LIKE',"%$query%")->where('is_published',true)->get();
        return view('search',compact('stories','query'));
    }

    public function searchByTags($tags){

        SEOTools::setTitle($tags);
        $stories = Story::withAllTags($tags)->get();
        return view('tags',compact('stories','tags'));
    }

    public function createStoryRules(){
        return view('rules');
    }


}
