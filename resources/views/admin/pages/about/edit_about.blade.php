@extends('admin.layouts.admin_master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Home About</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update-about',$about->id) }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" value="{{ $about->title }}" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Short Description</label>
                        <textarea name="short_description" class="form-control" id="" cols="15" rows="5">
                            {{ $about->short_description }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Long Description</label>
                        <textarea name="long_description" class="form-control" id="" cols="30" rows="10">
                            {{ $about->long_description }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
