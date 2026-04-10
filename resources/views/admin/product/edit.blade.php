@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Edit Products
                <a href="{{ url('admin/products/view') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            <form action="{{ url('admin/products/update/' . $products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $products->name }}">
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="">Quantity</label>
                        <input type="text" name="quantity" class="form-control" value="{{ $products->quantity }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="{{ $products->price }}">
                    </div>

    

                    <div class="col-md-12 mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <div class="card p-2 d-flex flex-row align-items-center gap-3">
                            <input type="file" id="image" name="image" class="form-control" accept="image/*"
                                style="max-width: 250px;" />
                            @if ($products->image)
                                <img src="{{ asset($products->image) }}" alt="Current Image" class="rounded"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <div class="rounded bg-light d-flex align-items-center justify-content-center"
                                    style="width: 100px; height: 100px; color: #888;">
                                    No Image
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>

            </form>


        </div>
    </div>
@endsection
