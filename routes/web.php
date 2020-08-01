<?php

use App\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/project', function() {
    $projects = Project::all();
    return view('admin.project',compact('projects'));
})->name('admin.project');

Route::get('/user', function() {
    return view('admin.user');
})->name('admin.user');

Route::get('/notification', function() {
    return view('admin.notification');
})->name('admin.notification');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-project',function(){
    return view('Admin.Project.add_project');
})->name('project.add');

Route::post('/add','AdminController@add')->name('project.push');

Route::get('/edit-project/{id}',function($id){
    $projects = Project::findOrFail($id);
    return view('Admin.Project.edit_project',compact('projects'));
})->name('project.edit');

Route::get('/view/{id}','AdminController@view')->name('project.view');

Route::get('/delete/{id}','AdminController@delete')->name('project.delete');
