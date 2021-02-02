@extends('admin.layouts.admin_master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Add Home Slider</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('create-slider') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">

                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
