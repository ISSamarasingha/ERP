@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">

            <h4 class="mb-0">
                Customers
                @if (auth()->user()->role === 'admin')
                    <a href="{{ url('admin/customers/create') }}" class="btn btn-primary float-end">Create Cutomers</a>
                @endif
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
                                <th>Telephone</th>
                                <th>City</th>
                                @if (auth()->user()->role === 'admin')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Telephone</th>
                                <th>City</th>
                                @if (auth()->user()->role === 'admin')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($customers as $customers)
                                <tr>
                                    <td>{{ $customers->id }}</td>
                                    <td>{{ $customers->firstname }} {{ $customers->lastname }}</td>
                                    <td>{{ $customers->telephone }}</td>
                                    <td>{{ $customers->city }}</td>
                                    @if (auth()->user()->role === 'admin')
                                        <td>
                                            <a href="{{ url('admin/customers/edit/' . $customers->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{ url('admin/customers/delete/' . $customers->id) }}"
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
