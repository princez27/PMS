@extends('Admin.layout.main')

@section('title')
  Admin Dashboard
@endsection('title')

@section('content')
<div class="row">
            <div class="col-md-2"></div>
            <div class="card col-md-3 bg-success" style="width: 18rem; height:15rem;">
              <div class="card-body">
                <h3 class="card-title text-center mt-5 text-dark">Users</h3>
                <h2 class="text-center text-dark"><i class="material-icons">person</i></h6>
                <h3 class="text-center text-dark mb-5">{{ $user }}</h3>
              </div>
            </div>
            <div class="col-md-2"></div>
            <div class="card col-md-3 bg-success" style="width: 18rem; height:15rem;">
              <div class="card-body">
                <h3 class="card-title text-center mt-5 text-dark">Projects</h3>
                <h2 class="text-center text-dark"><i class="material-icons">folder</i></h6>
                <h3 class="text-center text-dark mb-5">{{ $project }}</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="card col-md-3 bg-success" style="width: 18rem; height:15rem;">
              <div class="card-body">
                <h3 class="card-title text-center mt-5 text-dark">Completed Projects</h3>
                <h2 class="text-center text-dark"><i class="material-icons">folder_sharedy</i></h6>
                <h3 class="text-center text-dark mb-5">{{ $completed_project }}</h3>
              </div>
            </div>
            <div class="col-md-2"></div>
            <div class="card col-md-3 bg-success" style="width: 18rem; height:15rem;">
              <div class="card-body">
                <h3 class="card-title text-center mt-5 text-dark">Pending Projects</h3>
                <h2 class="text-center text-dark"><i class="material-icons">folder_open</i></h6>
                <h3 class="text-center text-dark mb-5">{{ $pending_project }}</h3>
              </div>
            </div>
          </div>
          </div>
@endsection('content')

