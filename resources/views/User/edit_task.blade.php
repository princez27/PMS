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
                    <a class="btn btn-sm btn-dark text-light"  href="{{ url()->previous() }}"><i class="material-icons custom">arrow_back</i></a>
                    <h1 class="text-center px-3">Edit Task</h1>
                    <form action="{{ route('edit.save',['tid' => $task->id ]) }}" method="post">
                        @csrf
                            <div class="form-group mx-3 mt-3">
                                <label>Task Title</label>
                                <input class="form-control bg-light text-dark" type="text" name="task_title" placeholder="Enter Task Title" value="{{ $task->title }}" />
                                @error('task_title')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="form-group mx-3">
                                <label>Task Description</label>
                                <textarea class="form-control" type="text" name="task_desc" placeholder="Enter Task description">{{ $task->Task_description }}</textarea>
                                @error('task_desc')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror    
                            </div>
                            <div class="form-group mx-3">
                                <label>Start Date</label>
                                @php
                                $date = Carbon::parse($task->start_date)->format('Y-m-d\TH:i');
                                @endphp
                                <input class="form-control" name="date_time" type="datetime-local" value="{{ $date }}" />
                                @error('date_time')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="form-group mx-3">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control text-dark" name="status">
                                    <option class="text-dark" value="0" {{ ($task->status == 0) ? 'selected' : '' }}>Pending</option>
                                    <option class="text-dark" value="1" {{ ($task->status == 1) ? 'selected' : '' }}>Completed</option>
                                </select>
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