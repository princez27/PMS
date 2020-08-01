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
                    <form method="POST" action="{{ route('project.update', ['id' => $projects->id]) }}" class="m-4">
                    @csrf
                        <div class="form-group">
                            <label class="text-dark"><strong>Project Name</strong></label>
                            <input type="text" name="pname" class="form-control text-dark" placeholder="Enter Project name" value="{{ $projects->project_name }}">
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><strong>Client name</strong></label>
                            <input type="text" name="cname" class="form-control text-dark" placeholder="Enter Client Name" value="{{ $projects->client_name }}">
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><strong>Description</strong></label>
                            <textarea name="desc" class="form-control text-dark" rows="3" placeholder="Description">{{ $projects->description }}</textarea>
                        </div>
                        <div class="form-group">
                        <label class="text-dark" for="inputState"><strong>Status</strong></label>
                          <select id="inputState" class="form-control text-dark" name="status">
                            <option class="text-dark" value="0" {{ ($projects->status == 0) ? 'selected' : '' }}>Pending</option>
                            <option class="text-dark" value="1" {{ ($projects->status == 1) ? 'selected' : '' }}>Completed</option>
                          </select>
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