<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">Update Category</div>
                        <div class="card-body">
                            <form action="{{ route('update-category',$category->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Update Category Name</label>
                                    <input type="text" name="category_name" value="{{ $category->category_name }}" placeholder="Enter Category Name" class="form-control">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Category </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
