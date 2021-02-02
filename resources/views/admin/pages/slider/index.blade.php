@extends('admin.layouts.admin_master')
@section('content')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">All Sliders</h2>
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <a href="{{ route('add-slider') }}" style="float: right;"> <button class="btn btn-info">Add Slider</button> </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-success table-striped">
                            <thead class="table-success">
                              <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ Str::limit($slider->title,15, ' ...') }}</td>
                                    <td>{{ Str::limit($slider->description,50, ' ...') }}</td>
                                    <td><img src="{{ asset($slider->image) }}" height="40px" width="70px" alt=""></td>
                                    <td>
                                        <a href="" class="btn btn-info">Edit</a>
                                        <a href="" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
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

