@extends('Admin.layout.main')

@section('title')
  Projects Page
@endsection

@section('content')
<div class="card col-md-12 bg-success">
  <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-dark text-center"><h4><strong>Project</strong></h4></th>
                <th scope="col" class="text-dark text-center"><h4><strong>Client Name</strong></h4></th>
                <th scope="col" class="text-dark text-center"><h4><strong>Description</strong></h4></th>
                <th scope="col" class="text-dark text-center"><h4><strong>Status</strong></h4></th>                
                <th scope="col" class="text-dark text-center"><h4><strong>Actions</strong></h4></th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td class="text-dark text-center"><strong>{{ $project->project_name }}</strong></td>
                <td class="text-dark text-center"><strong>{{ $project->client_name }}</strong></td>
                <td class="text-dark text-center"><strong>{{ $project->description }}</strong></td>
                <td>
                    @php
                        if($project->status == 1)
                            {$status = 'Completed';
                              
                            }
                        else
                            {$status = 'Pending';
                            }
                        @endphp
                          <p class="text-center"><span class="{{ ($status == 'Completed')? 'badge badge-warning' : 'badge badge-danger' }}">{{ $status }}</span></p>
                </td>
                <td class="text-center">
                    <a class="text-dark" href="{{ route('project.view',['id' => $project->id]) }}">
                        <button type="button" class="btn btn-sm btn-info">View</button>
                    </a>
                    <a class="text-dark" href="{{ route('project.edit',['id' => $project->id]) }}">
                        <button type="button" class="btn btn-sm btn-warning">Edit</button>
                    </a>
                    <a class="text-dark" href="{{ route('project.delete',['id' => $project->id]) }}">
                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p class="text-center">
        <a href="{{ route('project.add') }}">
            <button type="button" class="btn btn-lg btn-block btn-light">
            <i class="material-icons">add</i>
                Add Project
            </button>
        </a>
    </p>
  </div>
</div>
@endsection