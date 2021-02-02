@extends('admin.layouts.admin_master')
@section('content')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">All Brand</h2>
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-success table-striped">
                            <thead class="table-success">
                              <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                {{-- @php($i=1) --}}
                                @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brands->firstItem()+$loop->index }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    {{-- <td>{{ $category->name }}</td> --}}
                                    <td><img src="{{ asset($brand->brand_image) }}" height="40px" width="70px" alt=""></td>
                                    <td>
                                        @if ($brand->created_at == Null)
                                            <span class="text-danger">Data not set</span>
                                        @else
                                            {{ $brand->created_at->diffForHumans() }}
                                            {{-- {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }} --}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit-brand',$brand->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete-brand',$brand->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                          </table>
                          {{ $brands->links() }}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Brand</div>
                    <div class="card-body">
                        <form action="{{ route('store-brand') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Brand Name</label>
                                <input type="text" name="brand_name" value="{{ old('brand_name') }}" class="form-control">
                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Brand Image</label>
                                <input type="file" name="brand_image" class="form-control">
                                @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Brand </button>
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

