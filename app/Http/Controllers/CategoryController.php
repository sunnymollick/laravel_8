<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allCategory(){
        // $categories = Category::all();
        // $categories = DB::table('categories')->latest()->paginate(5);
        // $categories = Category::latest()->get();
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        // $categories = DB::table('categories')
        //                         ->join('users','categories.user_id','users.id')
        //                             ->select('categories.*','users.name')
        //                                 ->latest()
        //                                     ->paginate(5);
        return view('admin.category.index',['categories'=>$categories,'trashCat'=>$trashCat]);
    }

    public function addCategory(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please insert Category name',
            'category_name.max' => 'Category name is too long',
        ]
    );

    // Category::insert([
    //     'category_name' => $request->category_name,
    //     'user_id' => Auth::user()->id,
    //     'created_at' => Carbon::now()
    // ]);

    // $data = array();
    // $data['category_name'] = $request->category_name;
    // $data['user_id'] = Auth::user()->id;
    // DB::table('categories')->insert($data);

    $category = new Category();
    $category->category_name = $request->category_name;
    $category->user_id = Auth::user()->id;
    $category->save();

    return redirect()->back()->with('success','successfully category inserted');


    }

    public function editCategory($id){
        // $category = DB::table('categories')->where('id',$id)->first();
        $category = Category::find($id);
        return view('admin.category.edit_category',['category'=>$category]);
    }

    public function updateCategory(Request $request , $id){

        // Category::find($id)->update([
        //             'category_name' => $request->category_name,
        //             'user_id' => Auth::user()->id,
        // ]);

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->where('id',$id)->update($data);

        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();

        return redirect('all/category')->with('success','successfully category updated');
    }

    public function softDeleteCategory($id){
        $category = Category::find($id)->delete();
        return redirect('all/category')->with('success','successfully soft deleted category');
    }

    public function restoreCategory($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return redirect('all/category')->with('success','successfully restored category');
    }

    public function pdeleteCategory($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return redirect('all/category')->with('success','successfully category parmanently');
    }
}
