<?php

namespace App\Http\Controllers\User;

use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{   //comeback
    public function include_task($id)
    {
        return view('User.add_task', compact('id'));
    }

    public function save(Request $request,$project_id)
    {
        $request->validate([
            'task_title' => 'required|string',
            'task_desc' => 'required|string',
            'date_time' => 'date|nullable'
        ]);
        $user_id = Auth::user()->id; 
        
        $task = Job::create([
            'title' => $request->task_title,
            'Task_description' => $request->task_desc,
            'start_date' => $request->date_time,
            'status' => 0,
            'user_id' => $user_id ,
            'project_id' => $project_id,
        ]);
        return redirect()->Route('user.manage', ['id'=>$project_id]);
    }

    public function edit($tid , $pid)
    {   
        $task = Job::findOrFail($tid);
        return view('User.edit_task',compact('task'));
    }

    public function store(Request $request,$tid)
    {
        $completed=NULL;
        if(($request->status==1))
        {
            $completed = Carbon::now();
        }
        $request->validate([
            'task_title' => 'required',
            'task_desc' => 'required',
            'date_time' => 'required',
        ]);
        $task = Job::findOrFail($tid);
        $task->update([
            'title' => $request->task_title,
            'Task_description' => $request->task_desc,
            'status' => $request->status,
            'start_date' => $request->date_time,
            'end_date' => $completed,
        ]);
        return redirect()->back();
    }

    public function delete($tid,$pid)
    {
        $task = Job::findOrFail($tid);
        $task->delete();
        return redirect()->back();
    }
}
