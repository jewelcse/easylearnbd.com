<?php

namespace App\Http\Controllers;

use App\Story;
use App\User;
use Illuminate\Support\Facades\URL;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Carbon;
class ShowStoryController extends Controller
{

    /*
     * index siingle story view controller
     */
    public function fetchSingleStory($slug){

        /*
         * story fetch using $slug
         */

        $story = Story::where('slug', $slug)->first();
        $story->views_count = $story->views_count+1; // views count added every request
        $story->save(); // update views count

        /*
         * set seo settings
         */
        SEOMeta::setTitle($story->title);
        SEOMeta::setDescription($story->seo_description);
        SEOMeta::addMeta('article:published_time',Carbon::createFromFormat('Y-m-d H:i:s', $story->published_at)->format('d/m/Y'), 'property');
        SEOMeta::addMeta('article:section', $story->category->name, 'property');
        SEOMeta::addKeyword($story->seo_keywords);

        OpenGraph::setDescription($story->seo_description);
        OpenGraph::setTitle($story->title);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);



        $relStories = Story::where('category_id',$story->category_id)
            ->where('id', '!=', $story->id)->limit(3)->get();;

        return view('story',compact('story','relStories'));
    }

    public function authorStories($slug){

        $stories = User::where('slug', $slug)->first()->stories()->where('is_published',1)->get();
        $author = User::where('slug', $slug)->first();
        return view('stories.author')
            ->with('stories',$stories)
            ->with('author',$author);

    }

    /*
     *  Author single story view for unregistered users
     */
    public function authorStory($aslug,$sslug){

        $story = Story::where('slug', $sslug)->first();

        /*
         * set seo settings
         */
        SEOMeta::setTitle($story->title);
        SEOMeta::setDescription($story->seo_description);
        SEOMeta::addMeta('article:published_time',Carbon::createFromFormat('Y-m-d H:i:s', $story->published_at)->format('d/m/Y'), 'property');
        SEOMeta::addMeta('article:section', $story->category->name, 'property');
        SEOMeta::addKeyword($story->seo_keywords);

        OpenGraph::setDescription($story->seo_description);
        OpenGraph::setTitle($story->title);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);




        $relStories = Story::where('category_id',$story->category_id)
            ->where('id', '!=', $story->id)->limit(3)->get();

        return view('stories.author_single_story',compact('story','relStories'));
//        return view('stories.author_single_story')
//            ->with('story',$story)
//            ->with('author',$author);

    }
}
