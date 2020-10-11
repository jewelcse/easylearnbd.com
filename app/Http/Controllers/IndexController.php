<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Story;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\Tagged;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $stories = Story::where('is_published',1)->latest()->paginate(10);
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
            ->with('featureStories',$feaStories)
            ->with('i', (request()->input('page', 1) - 1) * 5);;
    }


    public function storiesByCategory($slug){


        $categories = Category::all();
        $category = Category::where('slug',$slug)->first();
        $stories  = Story::where('is_published',1)
            ->where('category_id',$category->id)->get();

        SEOMeta::setTitle($slug);
        SEOMeta::setDescription($category->seo_description);
        SEOMeta::addMeta('category:published_time',Carbon::createFromFormat('Y-m-d H:i:s', $category->created_at)->format('d/m/Y'), 'property');

        SEOMeta::addKeyword($category->seo_keywords);

        OpenGraph::setDescription($category->seo_description);
        OpenGraph::setTitle($category->name);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'category');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);


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

    public function about(){
        return view('pages.about');
    }
    public function priacy_policy(){
        return view('pages.privacy-policy');
    }
    public function contact(){

        return view('pages.contact');
    }

    public function contactFormStore(Request $request){
        $request->validate([
            'name'=>['required'],
            'message'=>['required'],
            'subject'=>['required'],
            'email'=>['required', 'email']
        ]);

       Contact::create([
            'name'=>$request->get('name'),
            'subject'=>$request->get('subject'),
            'email'=>$request->get('email'),
            'message'=>$request->get('message'),
        ]);
       
        return back()->with('status','Send Message Success');
    }


}
