<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">All Category</h2>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                        </div>
                        <div class="card-body">
                            <table class="table table-success table-striped">
                                <thead class="table-dark">
                                  <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i=1) --}}
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $categories->firstItem()+$loop->index }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        {{-- <td>{{ $category->name }}</td> --}}
                                        <td>{{ $category->user->name }}</td>
                                        <td>
                                            @if ($category->created_at == Null)
                                                <span class="text-danger">Data not set</span>
                                            @else
                                                {{ $category->created_at->diffForHumans() }}
                                                {{-- {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }} --}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit-category',$category->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('softDelete-category',$category->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                              </table>
                              {{ $categories->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{ route('store-category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input type="text" name="category_name" value="{{ old('category_name') }}" placeholder="Enter Category Name" class="form-control">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Category </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center text-dark">All Trash</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-success table-striped">
                                <thead class="table-dark">
                                  <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i=1) --}}
                                    @foreach ($trashCat as $category)
                                    <tr>
                                        <td>{{ $categories->firstItem()+$loop->index }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        {{-- <td>{{ $category->name }}</td> --}}
                                        <td>{{ $category->user->name }}</td>
                                        <td>
                                            @if ($category->created_at == Null)
                                                <span class="text-danger">Data not set</span>
                                            @else
                                                {{ $category->created_at->diffForHumans() }}
                                                {{-- {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }} --}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('restore-category',$category->id) }}" class="btn btn-info">Restore</a>
                                            <a href="{{ route('pdelete-category',$category->id) }}" class="btn btn-danger">P Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                              </table>
                              {{ $trashCat->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
