@extends('User.layout.main')

@section('title')
User
@endsection('title')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="md-12">
                <div class="px-3 text-dark">
                    <strong>Projects :</strong
                </div> 
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
        @if(empty($projects))
            <h1 style="color: red;">NO PROJECT ASSOCIATED<h1>
        @endif
        @foreach($projects as $project)
            @foreach($project as $p)
                <div class=" col-md-6 mb-5">
                    <div class="card">
                        <div class="card-body bg-info">
                            <div class="px-3 pt-2 mb-3">
                                <h1>{{ $p->project_name }}</h1>
                            </div>
                                
                            <div class="px-3 py-2">
                                <h5>{{ $p->description }}</h5>
                            </div> 
                            <div class="mt-4">
                                <a class="btn"><span class="badge badge-light">
                                    {{ $p->users->Count() }}
                                </span> Member</a>
                                <a class="btn" id="btn1" href="{{ route('user.manage',['id' => $p->id]) }}">Manage Task</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection('content')

@section('footer')

@endsection('footer')