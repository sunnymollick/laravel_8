<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi <b>{{ Auth::user()->name }}</b>
            <b style="float: right;">
                Total Users : <span class="badge bg-danger">{{ count($users) }}</span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">All Users</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-success table-striped">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $i++ }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        {{-- <td>{{ $user->created_at->diffForHumans() }}</td> --}}
                                        <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
