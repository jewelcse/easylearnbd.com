<?php

namespace App\Http\Controllers;

use App\Story;
use App\StoryImage;
use App\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$userId = Auth::user()->id;
        //dd($userId);
        //$user = User::find($userId);
        //dd($user);
        //$user->stories;
        //dd($user);
        //$stories = Story::latest()->paginate(2);
        $stories = auth()->user()->stories()->latest()->paginate(5);

        //dd($stories);
        return view('user.show',compact('stories')) ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function stories(){

        $stories = User::find(Auth::user()->id)->stories()->where('is_published',1)->get();
        return view('user.published',compact('stories'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'unique:stories', 'max:255'],
            'slug'=>['requird','unique:stories'],
            'body' => ['required'],
            'img_name'=>['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'tag'=>['required']
        ]);


        $tags = explode(',',$request->tag);

        $imageName = time().'.'.$request->img_name->extension();

        $request->img_name ->move(public_path('images'), $imageName);

        $story = auth()->user()->stories()->create([
            'title'=> $request->get('title'),
            'slug'=>SlugService::createSlug(Story::class,'slug',$request->title),
            'body'=> $request->get('body'),
            'img_name'=> $imageName,
        ]);
        $story->tag($tags);

//
//        $userId = Auth::user()->id;
//        $user = User::find($userId);


//        $story = new Story();
//        $story->title = $request->get('title');
//        $story->body = $request->get('body');
//        $tags = explode(", ", $request->get('tags'));
//        $story->tags = $tags;
//        $user->story()->save($story);
//        $user->tag($tags);

//        $input = $request->all();
//        $input['user_id'] = $userId;
//        //return$input['tags'];
//        //return $input;
//        $tags = explode(", ", $input['tags']);
//        $story = Story::create($input);
//        //$story->tags($tags);
//
//       // return $tags;


        return redirect('/story/create')->with('status', 'Successfully Created! After review we will published so soon..');









        //Story::create($request->all());

//return $request->all();

        //return $userId = Auth::user()->id;

//        $story = new Story();
//        $story->title = "This is first story";
//        $story->body = "This is body";
//        $user->story()->save($story);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $story = Story::where('slug', $slug)->first();
        return view('user.story',compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $story = Story::where('slug', $slug)->first();
        return view('user.edit',compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        //dd($request);

        $request->validate([
           'title'=>'required','max:255',
           'body'=>'required'
        ]);

        $story->update($request->all());
        return redirect()->route('story.index')->with('status','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return $id;
        $story =  Story::find($id);
        $story->delete();
        return back();
    }

    public function imagesUpload(Request $request,StoryImage $storyImage){


        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        //return $imageName;
        $request->image->move(public_path('images'), $imageName);

        auth()->user()->storyimages()->create(['img_name'=>$imageName]);

        return back()
            ->with('success','You have successfully upload image.');


    }
    public function authorImages(){

       $images = auth()->user()->storyimages;
       //$images = auth()->user()->storyimages();
        return view('user.images',compact('images'));
    }


    public function uploadImage(Request $request)
    {
//        $imgpath = $request->file('file')->store('body', 'public');
//        return response()->json(['location' => "/storage/$imgpath"]);


        $file=$request->file('file');
        $path= url('/uploads/').'/'.$file->getClientOriginalName();
        $imgpath=$file->move(public_path('/uploads/'),$file->getClientOriginalName());
        $fileNameToStore= $path;


        return json_encode(['location' => $fileNameToStore]);


//        $imgpath = $request->file('file')->store('post', 'public');
//        return response()->json(['location' => "/storage/$imgpath"]);

    }

//    public function checkSlug(Request $request){
//        $slug = SlugService::createSlug(Story::class,'slug',$request->title);
//        return response()->json(['slug'=>$slug]);
//
//    }
}
