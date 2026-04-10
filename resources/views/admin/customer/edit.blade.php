@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Edit Customers
                <a href="{{ url('admin/customers/view') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
    <div class="card-body">

        <form action="{{ url('admin/customers/update/' . $customers->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="row">

                    <div class="col-md-12">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" class="form-control" value="{{ $customers->firstname }}" readonly>
                    </div>
               

                    <div class="col-md-12">
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="{{ $customers->lastname }}"readonly>
                    </div>

                    <div class="col-md-12">
                        <label>Telephone Number</label>
                        <input type="text" name="telephone" class="form-control" value="{{ $customers->telephone }}">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" value="{{ $customers->city }}">
                    </div>

                    <div class="col-md-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>

        </form>


    </div>
    </div>
@endsection
