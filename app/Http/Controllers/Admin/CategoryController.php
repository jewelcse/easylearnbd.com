<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Story;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function showCategoryIndex(){
        $categories = Category::latest()->paginate(5);
        return view('admin.admin_category',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function createCategory(){
        return view('admin.admin_add_category');
    }

    public function storeCategory(Request $request){
        $request->validate([
            'name'=>['required']
        ]);

        $category = new Category();

        $category->name = $request->get('name');
        $category->seo_description = $request->get('seo_description');
        $category->seo_keywords = $request->get('seo_keywords');
        $category->slug = SlugService::createSlug(Category::class,'slug',$request->name);
        $category->save();

//        auth()->admin()->create([
//           'name' => $request->get('name'),
//            'slug'=>SlugService::createSlug(Category::class,'slug',$request->name),
//        ]);

        return redirect(url('admin/category'))->with('status1','Category Create success');



    }


    public function viewUpdateCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.admin_edit_category',compact('category'));
    }

    public function updateCategory(Request $request,$id){

        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->slug = SlugService::createSlug(Category::class,'slug',$request->name);
        $category->save();

        return redirect(url('admin/category'))->with('status1','Category Update success');
    }

    public function deleteCategory($id){

        //return $id;

        $category = Category::find($id);
        $category->delete();

        return back()->with('status1','Category delete success');

    }

}
