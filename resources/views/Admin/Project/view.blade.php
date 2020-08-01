@extends('Admin.Layout.main')

@section('title')
  Edit Project
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card bg-success">
          <div class="card-header text-center">
            <h2 class="title">{{ $projects->project_name }}</h2>
          </div>
          <div class="card-body">
            <h3 class="card-title text-dark"><b><strong>Client Name :</strong></b> {{ $projects->client_name }}</h3>
            <h3 class="text-dark"><b><strong>Description :</strong></b>{{ $projects->description }}</h3>
              @php
                if($projects->status == 1)
                {
                  $status = 'Completed';
                }
                else{
                  $status = 'In Progress';
                }
              @endphp
            <h3 class="text-dark"><strong><b>Status :</strong></b> <span class="{{ ($status == 'In Progress') ? 'text-danger' : 'text-warning' }}"> <strong>{{ $status }}</strong></span> </h3>
            <h3 class="text-dark"><strong><b>Members :</strong></b></h3>
            <div class="col-md-6">
              @if($member->isEmpty())
                <span class="msg text-danger"><strong>NO MEMBER ASSOCIATED</strong></span>
              @endif
              @foreach ($member as $mem)
                <div>
                  <h4 class="text-dark"><b><strong>{{ $mem->name }}</strong></b></h4>
                </div>
              @endforeach
              <div><a href="{{ route('member.add',['id' => $projects->id]) }}"><button type="button" class="btn btn-sm btn-light"><i class="material-icons">add</i>Add new Member</button></a></div>
              <div><a href="{{ route('member.add',['id' => $projects->id]) }}"><button type="button" class="btn btn-sm btn-danger"><i class="material-icons">delete</i>Delete Member</button></a></div>
              </div><br>
              <h3 class="text-dark"><strong><b>Tasks :</strong></b></h3>
              <div class="col-md-12">
                @if($job->isEmpty())
                  <span class="msg text-danger"><strong>NO TASK ASSOCIATED</strong></span>
                @endif
                @foreach ($job as $j)
                  @php
                    $user = User::findOrFail($j->user_id);
                  @endphp
                  <div class="task">
                    <div class="btn" id="btn2">{{ $j->title }}</div>
                      <div class="btn" id="btn1">Added By : {{ $user->name }}</div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection('cotent')

