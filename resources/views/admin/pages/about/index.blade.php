@extends('admin.layouts.admin_master')
@section('content')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Home About</h2>
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <a href="{{ route('add-about') }}" style="float: right;"> <button class="btn btn-info">Add Home Info</button> </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-success table-striped">
                            <thead class="table-success">
                              <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Title</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Long Description</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($abouts as $about)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ Str::limit($about->title,15, ' ...') }}</td>
                                    <td>{{ Str::limit($about->short_description,30, ' ...') }}</td>
                                    <td>{{ Str::limit($about->long_description,45, ' ...') }}</td>
                                    <td>
                                        <a href="{{ route('edit-about',$about->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete-about',$about->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                          </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection

