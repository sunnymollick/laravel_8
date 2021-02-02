<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Image;


class BrandController extends Controller{
    public function index(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.pages.brand.index',['brands'=>$brands]);
    }

    public function addBrand(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:3',
            'brand_image' => 'required|image|mimes:png,jpg',
        ],
        [
            'brand_name.required' => 'please insert brand name',
            'brand_name.min' => 'Brand name is too short'
        ]);

        $image = $request->file('brand_image');

        $image_name = hexdec(uniqid());
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $path = 'uploads/brand/';
        $image_url =  $path.$image_full_name;
        // $image->move($path,$image_full_name);
        Image::make($image)->resize(300,200)->save($image_url);


        $brands= new Brand();
        $brands->brand_name = $request->brand_name;
        $brands->brand_image = $image_url;
        $brands->save();

        return redirect('all/brand')->with('success','successfully Brands inserted');

    }

    public function editBrand($id){
        $brand = Brand::find($id);
        return view('admin.pages.brand.edit_brand',['brand'=>$brand]);
    }

    public function updateBrand(Request $request , $id){
        $validated = $request->validate([
            'brand_name' => 'required|min:3',
        ],
        [
            'brand_name.required' => 'please insert brand name',
            'brand_name.min' => 'Brand name is too short'
        ]);

        $brand = Brand::find($id);

        if($request->file('brand_image')){
            $image = $request->file('brand_image');

            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $path = 'uploads/brand/';
            $image_url =  $path.$image_full_name;
            $image->move($path,$image_full_name);
            unlink($brand->brand_image);

            $brand->brand_name = $request->brand_name;
            $brand->brand_image = $image_url;
            $brand->save();

            return redirect('all/brand')->with('success','successfully Brands updated');
        }else{
            $brand->brand_name = $request->brand_name;
            $brand->save();
            return redirect('all/brand')->with('success','successfully Brands updated');

        }
    }

    public function deleteBrand($id){
        $brand = Brand::find($id);
        $old_image = $brand->brand_image;
        unlink($old_image);
        $brand->delete();
        return redirect('all/brand')->with('success','successfully Brands deleted');

    }
}
