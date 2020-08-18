@extends('User.layout.main')

@section('title')
    Add Task
@endsection('title')

@section('css')
   
@endsection('css')

@section('content')
<?php use Carbon\Carbon; ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class=" col-md-8">
                <div class="card bg-info">
                    <div class="card-body">
                    <a class="btn btn-sm btn-dark text-light"  href="{{ Route('user.manage',['id' => $id]) }}"><i class="material-icons custom">arrow_back</i></a>
                    <h1 class="text-center px-3">Add Task</h1>
                    <form action="{{ Route('task.save',['pid' => $id]) }}" method="post">
                        @csrf
                            <div class="form-group mx-3 mt-3">
                                <label>Task Title</label>
                                <input class="form-control bg-light text-dark" type="text" name="task_title" placeholder="Enter Task Title" />
                                @error('task_title')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="form-group mx-3">
                                <label>Task Description</label>
                                <textarea class="form-control" type="text" name="task_desc" placeholder="Enter Task description"></textarea>
                                @error('task_desc')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror    
                            </div>
                            <div class="form-group mx-3">
                                <label>Start Date</label>
                                <input class="form-control" name="date_time" type="datetime-local">
                                @error('date_time')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="form-group  mx-3">
                                <p class="text-center pt-4"><button type="submit" class="btn btn-secondary">Submit</button></p>
                            </div>
                    </form>  
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection('content')