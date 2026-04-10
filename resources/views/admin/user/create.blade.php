@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Edit Users
                <a href="{{ url('admin/users/view') }}" class="btn btn-danger float-end">Back</a>
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

            <form action="{{ url('admin/users/update/' . $users->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Name</label>
                      <input type="text" name="name" class="form-control" value="{{ $users->name }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="">Email</label>
                       <input type="text" name="email" class="form-control" value="{{ $users->email }}" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="role">Role</label>
                        <select id="role" name="role" class="form-control">
                            <option value="" disabled selected>Select a role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>


                    <div class="col-md-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection
