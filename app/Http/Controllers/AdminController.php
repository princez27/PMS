<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use App\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //project
    public function add(Request $request){
        Project::create([
            'project_name' => $request->pname,
            'client_name' => $request->cname,
            'description' => $request->desc,
            'status' => 0,
        ]);
        return redirect()->route('admin.project');
    }

    public function update(Request $request,$id){
        $project = Project::findOrFail($id);
        $project->update([
            'project_name' => $request->pname,
            'client_name' => $request->cname,
            'description' => $request->desc,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.project');
    }

    public function delete($id){
        $projects = Project::findOrFail($id);
        $projects->delete();
        return redirect()->back();
    }

    public function view($id)
    {
        $projects = Project::findOrFail($id);
        $member = $projects->users()->get(array('name'));
        $job = Job::where('project_id','=',$id)->get();
       
        return view('Admin.Project.view',compact('projects','member', 'job'));
    }
    public function add_member($id,$pid)
    {
        $projects = Project::findOrFail($pid);
        $projects->users()->syncWithoutDetaching($id);
        return redirect()->back();
    }
    public function delete_member($mid,$pid)
    {
        $project = Project::findOrFail($pid);
        $project->users()->detach($mid);
        return redirect()->back();
    }
    //user
    public function user_edit(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'user_type' => 'required|boolean',
        ]);
        
        
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            // 'user_type' => $request->has('user_type'),
        ]);
        return redirect()->route('admin.user');
    }

    public function user_delete(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
