<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(){
        $user = User::where('user_type',0)->count();
        $project = Project::count();
        $completed_project = Project::where('status',1)->count();
        $pending_project = Project::where('status',0)->count();
        return view('admin.dashboard',compact('user', 'project', 'completed_project', 'pending_project'));
    }
}
