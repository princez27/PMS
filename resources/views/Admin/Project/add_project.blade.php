@extends('Admin.layout.main')

@section('title')
  Projects Page
@endsection

@section('content')
    <div class="content">
        <div class="row">
        <div class="col-md-3">
        </div>

        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-body">
                    <form method="POST" action="{{ route('project.push') }}" class="m-4">
                    @csrf
                        <div class="form-group">
                            <label class="text-dark"><strong>Project Name</strong></label>
                            <input type="text" name="pname" class="form-control text-dark" placeholder="Enter Project name">
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><strong>Client name</strong></label>
                            <input type="text" name="cname" class="form-control text-dark" placeholder="Enter Client Name">
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><strong>Description</strong></label>
                            <textarea name="desc" class="form-control text-dark" rows="3" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Submit</button>
                            <a href="{{ route('admin.project') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        <div>
    </div>
@endsection('content')