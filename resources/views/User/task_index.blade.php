@extends('User.Layout.main')

@section('css')

@endsection('css')

@section('content')
<?php use Carbon\Carbon; ?>
<div class="card bg-info my-5">
    <div class="card-body">
    <a class="btn btn-sm btn-dark text-light"  href="{{ Route('user.index') }}"><i class="material-icons custom">arrow_back</i></a>
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="col" class="text-dark text-center"><h4><strong>Task</strong></h4></th>
                    <th scope="col" class="text-dark text-center"><h4><strong>Task description</strong></h4></th>
                    <th scope="col" class="text-dark text-center"><h4><strong>Members</strong></h4></th>
                    <th scope="col" class="text-dark text-center"><h4><strong>Created At</strong></h4></th>             
                    <th scope="col" class="text-dark text-center"><h4><strong>Start date</strong></h4></th>             
                    <th scope="col" class="text-dark text-center"><h4><strong>Completed on</strong></h4></th>             
                    <th scope="col" class="text-dark text-center"><h4><strong>Actions</strong></h4></th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr class="text-dark text-center">
                    <td>
                        {{ $task->title }}
                    </td>
                    <td>
                        {{ $task->Task_description }}
                    </td>
                    <td>
                        @foreach($member as $mem)
                            {{ $mem->name }}<br>
                        @endforeach
                    </td>
                    <td>{{ $task->created_at }}</td>
                    <td class="@if($task->start_date == NULL){ text-danger } @endif">
                        {{($task->start_date == NULL)? "Pending" : $task->start_date}}
                    </td>
                    <td class="@if($task->end_date == NULL){ badge badge-danger } @else { badge badge-success } @endif mt-3">
                        {{($task->end_date == NULL)? "Pending" : $task->end_date}}
                    </td>
                    <td>
                        <a href="#">
                            <button type="button" class="btn btn-sm btn-dark">View</button>
                        </a>
                        <a href="{{ Route('task.edit', ['tid' => $task->id, 'pid' => $id]) }}">
                            <button type="button" class="btn btn-sm btn-warning">Edit</button>
                        </a>
                        <a href="{{ route('task.delete',['tid' => $task->id , 'pid' => $id]) }}">
                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class="text-center">
            <a href="{{ Route('task.include', ['id' => $id]) }}">
                <button type="button" class="btn btn-light">
                    +Add Task
                </button>
            </a>
        </p>
    </div>
</div>
@endsection('content')
