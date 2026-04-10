@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">

            <h4 class="mb-0">
                Users

            </h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" id="flash-message" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card mb-4">

                <div class="card-body">
                    <table class="datatable table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                @if (auth()->user()->role === 'admin')
                                    <th>Action</th>
                                @endif

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                @if (auth()->user()->role === 'admin')
                                    <th>Action</th>
                                @endif

                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($users as $users)
                                <tr>
                                    <td>{{ $users->id }}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->role }}</td>
                                    @if (auth()->user()->role === 'admin')
                                        <td>
                                            <a href="{{ url('admin/users/create/' . $users->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{ url('admin/users/delete/' . $users->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
