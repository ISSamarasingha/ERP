@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Create Customers
                <a href="{{ url('admin/dashboard') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('admin/customers/add') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" class="form-control" />
                    </div>
                    <div class="col-md-12">
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" class="form-control" />
                    </div>

                    <div class="col-md-12">
                        <label for="">Telephone Number</label>
                        <input type="text" name="telephone" class="form-control" />
                    </div>

                     <div class="col-md-12"> 
                        <label for="">City</label>
                        <input type="text" name="city" class="form-control" />
                    </div>


                    <div class="col-md-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection
