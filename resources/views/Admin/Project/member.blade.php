@extends('Admin.layout.main')

@section('title')
  Add Member
@endsection('title')

@section('content')
      <div class="content">
        <div class="row">
            <div class="col-md-3">
                
            </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body bg-success">
                    <div class="card-header text-center">
                        <h2 class="title">Add Member</h2>
                    </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                    <th class="text-center text-dark">
                        <b><strong>Add Member To Project</strong></b>
                    </th>
                    <th class="text-center text-dark">
                    <b><strong>Add</strong></b>
                    </th>
                    </thead>
                    <tbody>
                    @foreach($user as $u)
                    <tr>
                        <td class="text-center text-dark">
                            <b>{{ $u->name }}</b> 
                        </td>
                        <td>
                            <a href="{{ route('member.push',['id' => $u->id , 'pid' => $projects->id]) }}" class="btn btn-secondary">Add</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <a href="{{ route('project.view',['id' => $projects->id]) }}" class="btn btn-danger text-center">Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection('content')