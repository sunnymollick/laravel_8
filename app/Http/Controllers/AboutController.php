<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller{
    public function homeAbout(){
        $abouts = About::all();
        return view('admin.pages.about.index',['abouts'=>$abouts]);
    }

    public function addAbout(){
        return view('admin.pages.about.add_about');
    }

    public function createAbout(Request $request){
        About::insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'created_at' => Carbon::now(),
        ]);

        return redirect('home/about')->with('success','successfully about info inserted');
    }

    public function editAbout($id){
        $about = About::find($id);
        return view('admin.pages.about.edit_about',['about'=>$about]);

    }

    public function updateAbout(Request $request , $id){
        $about = About::find($id);
        $about->title = $request->title;
        $about->short_description = $request->short_description;
        $about->long_description = $request->long_description;
        $about->save();

        return redirect('home/about')->with('success','successfully about info updated');

    }

    public function deleteAbout($id){
        About::find($id)->delete();
        return redirect('home/about')->with('success','successfully about info deleted');
    }
}
