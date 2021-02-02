@extends('admin.layouts.admin_master')

@section('content')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Update Brand</div>
                    <div class="card-body">
                        <form action="{{ route('update-brand',$brand->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Update Brand Name</label>
                                <input type="text" name="brand_name" value="{{ $brand->brand_name }}" placeholder="Enter Category Name" class="form-control">
                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Update Brand Image</label>
                                <input type="file" name="brand_image" class="form-control">
                                @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <img src="{{ asset($brand->brand_image) }}" height="120px" width="240px" alt="">
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Brand </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection



