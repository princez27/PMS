@extends('Admin.Layout.main')

@section('title')
    Edit User
@endsection('title')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 p-4">
                <div class="card bg-success">
                    <div class="card-body">
                        <form action="{{ route('user.update',['id' => $user->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="text-dark py-3"><b><strong>Id</b></strong></label><br>
                            <input type="text" name="id" class="form-control text-dark bg-secondary" value="{{ $user->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><b><strong>Name</b></strong></label>
                            <input type="text" name="name" class="form-control text-dark" value="{{ $user->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><b><strong>Email</b></strong></label>
                            <input type="email" name="email" class="form-control text-dark" value="{{ $user->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="exampleFormControlInput1"><b><strong>User Type</b></strong></label>
                            <select name="user_type" class="form-control text-dark">
                                    <option value="0" {{ ($user->user_type == 0) ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ ($user->user_type == 1) ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('user_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Submit</button>
                            <a href="{{ route('admin.user') }}" id="cancel" class="btn btn-danger">Cancel</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')