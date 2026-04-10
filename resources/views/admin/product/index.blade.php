@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">

            <h4 class="mb-0">
                Products
                @if (auth()->user()->role === 'admin')
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary float-end">Create Product</a>
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
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                @if (auth()->user()->role === 'admin')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                @if (auth()->user()->role === 'admin')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($products as $products)
                                <tr>
                                    <td>{{ $products->id }}</td>
                                    <td>{{ $products->name }}</td>
                                    <td>
                                        @if ($products->image)
                                            <img src="{{ asset($products->image) }}" width="60"
                                                height="60" style="object-fit: cover;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $products->quantity }}</td>
                                    <td>Rs. {{ $products->price }}</td>
                                    @if (auth()->user()->role === 'admin')
                                        <td>
                                            <a href="{{ url('admin/products/edit/' . $products->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{ url('admin/products/delete/' . $products->id) }}"
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
