@extends('admin.layouts.admin_master')

@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h3>Update Profile Info</h3>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="card-body">
            <form action="{{ route('update-profile-info') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset($user->profile_photo_path) }} " height="360px" width="380px" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Upload New </label>
                        <input type="file" name="profile_photo_path" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </form>
        </div>
    </div>
@endsection
