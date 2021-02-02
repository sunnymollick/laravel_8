@extends('admin.layouts.admin_master')
@section('content')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Multi Image</div>
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('store-image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Multi Image</label>
                                <input type="file" name="image[]" multiple class="form-control">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Add Images</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card-group">
                    @foreach ($images as $image)
                        <div class="col-md-4 mt-5">
                            <div class="card">
                                <img src="{{ asset($image->image) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

