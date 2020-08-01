<?php

namespace App\Http\Controllers;

use App\Job;
use App\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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
}
