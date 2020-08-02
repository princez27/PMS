<?php

use App\User;
use App\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//admin dashboard
Route::get('/dashboard', function () {
    $user = User::where('user_type',0)->count();
    $project = Project::count();
    $completed_project = Project::where('status',1)->count();
    $pending_project = Project::where('status',0)->count();
    return view('admin.dashboard',compact('user', 'project', 'completed_project', 'pending_project'));
})->name('admin.dashboard');

Route::get('/project', function() {
    $projects = Project::all();
    return view('admin.project',compact('projects'));
})->name('admin.project');

Route::get('/user', function() {
    $users=User::all();
    return view('admin.user',compact('users'));
})->name('admin.user');

Route::get('/notification', function() {
    return view('admin.notification');
})->name('admin.notification');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//admin-Project(Project Crud)
Route::get('/add-project',function(){
    return view('Admin.Project.add_project');
})->name('project.add');

Route::post('/add','AdminController@add')->name('project.push');

Route::get('/edit-project/{id}',function($id){
    $projects = Project::findOrFail($id);
    return view('Admin.Project.edit_project',compact('projects'));
})->name('project.edit');

Route::post('/update/{id}','AdminController@update')->name('project.update');

Route::get('/view/{id}','AdminController@view')->name('project.view');

Route::get('/delete/{id}','AdminController@delete')->name('project.delete');

Route::get('/member/add/{id}',function($id){
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
})->name('member.add');

Route::get('/add/member/{id}{pid}','AdminController@add_member')->name('member.push');


Route::get('/member/{id}',function($id){
    $projects = Project::find($id);
    $prev_member = $projects->users()->get(array('name'));
    
    // $pro_mem = $project->users;
    
    return view('Admin.Project.delete_member',compact('prev_member','projects'));
})->name('project.member');

Route::get('/delete/member/{id}{pid}','AdminController@delete_member')->name('member.pop');


//Admin User

Route::get('/user/edit/{id}', function($id){
    $user = User::findOrFail($id)->first();
    return view('Admin.user.user_edit',compact('user'));
})->name('user.edit');

Route::post('/user/update/{id}','AdminController@user_edit')->name('user.update');

Route::get('/user/delete/{id}','AdminController@user_delete')->name('user.delete');

