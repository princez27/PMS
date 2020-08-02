<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use App\User;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function project_index(){
        $projects = Project::all();
        return view('admin.project',compact('projects'));
    }

    public function add_project_index(){
        return view('Admin.Project.add_project');
    }

    public function add(Request $request){
        Project::create([
            'project_name' => $request->pname,
            'client_name' => $request->cname,
            'description' => $request->desc,
            'status' => 0,
        ]);
        return redirect()->route('admin.project');
    }

    Public function edit($id){
        $projects = Project::findOrFail($id);
        return view('Admin.Project.edit_project',compact('projects'));
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

    public function view($id)
    {
        $projects = Project::findOrFail($id);
        $member = $projects->users()->get(array('name'));
        $job = Job::where('project_id','=',$id)->get();
       
        return view('Admin.Project.view',compact('projects','member', 'job'));
    }

    public function delete($id){
        $projects = Project::findOrFail($id);
        $projects->delete();
        return redirect()->back();
    }

    public function include_member($id){
        $projects = Project::find($id);
        $user = $projects->users()->get(array('user_id'));
        $a = array();
        foreach($user as $u)
        {
            array_push($a,$u->user_id);
        }
        // return $a;
        $user =  User::whereNotIn('id',$a)->get();
        
        return view('Admin.project.add_member',compact('user','projects'));
    }

    public function add_member($id,$pid)
    {
        $projects = Project::findOrFail($pid);
        $projects->users()->syncWithoutDetaching($id);
        return redirect()->back();
    }

    public function remove_member($id){
        $projects = Project::find($id);
        $prev_member = $projects->users()->get(array('name'));
        return view('Admin.Project.delete_member',compact('prev_member','projects'));
    }

    public function delete_member($mid,$pid)
    {
        $project = Project::findOrFail($pid);
        $project->users()->detach($mid);
        return redirect()->back();
    }
}
