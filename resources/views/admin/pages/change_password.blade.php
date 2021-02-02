@extends('admin.layouts.admin_master')

@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h3>Change Password</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('update-password') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Current Passord</label>
                    <input type="password" id="current_password" name="oldpassword" placeholder="current password" class="form-control">
                    @error('oldpassword')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-grroup">
                    <label for="">New Password</label>
                    <input type="password" id="password" name="password" placeholder="New Password" class="form-control">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
