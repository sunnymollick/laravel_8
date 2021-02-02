<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brand;
use App\Models\MultiPicture;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeController extends Controller{
    public function index(){
        $brands = Brand::all();
        $about = About::latest()->first();
        $images = MultiPicture::all();
        return view('website.pages.index',['brands'=>$brands,'about'=>$about,'images'=>$images]);
    }

    public function homeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.pages.slider.index',['sliders'=>$sliders]);
    }

    public function addSlider(){
        return view('admin.pages.slider.add_slider');
    }

    public function createSlider(Request $request){
        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'required|image|mimes:png,jpg',
        ],
        [
            'title.required' => 'please insert slider title',
            'title.min' => 'Title is too short'
        ]);

        $image = $request->file('image');

        $image_name = hexdec(uniqid());
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $path = 'uploads/slider/';
        $image_url =  $path.$image_full_name;
        // $image->move($path,$image_full_name);
        Image::make($image)->resize(1920,1088)->save($image_url);


        $sliders= new Slider();
        $sliders->title = $request->title;
        $sliders->description = $request->description;
        $sliders->image = $image_url;
        $sliders->save();

        return redirect('home/slider')->with('success','successfully Slider inserted');

    }

    public function portfolio(){
        $images = MultiPicture::all();
        return view('website.pages.portfolio',['images'=>$images]);
    }
}
