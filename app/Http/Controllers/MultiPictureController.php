<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MultiPicture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MultiPictureController extends Controller{
    public function index(){
        $images = MultiPicture::all();
        return view('admin.pages.multipic.index',['images'=>$images]);
    }

    public function storeImage(Request $request){
        $images = $request->file('image');

        foreach ($images as $image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $path = 'uploads/multi/';
            $image_url =  $path.$image_full_name;
            // $image->move($path,$image_full_name);
            Image::make($image)->resize(300, 200)->save($image_url);

            // MultiPicture::insert([
            //     'image' => $image_url,
            //     'created_at' => Carbon::now(),
            // ]);

            $multi= new MultiPicture();
            $multi->image = $image_url;
            $multi->save();
        }

        return redirect('multi/image')->with('success','successfully '.count($images).' images have been uploaded');

    }
}
