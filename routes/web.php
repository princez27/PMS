<?php

use App\User;
use App\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;

Route::get('/', 'User\UserController@home')->name('user.home');

Auth::routes();


//admin dashboard
Route::group(['middleware' => ['auth','admin'] ,'prefix'=>'admin'],function(){
    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/project', 'Admin\ProjectController@project_index')->name('admin.project');
    Route::get('/user', 'Admin\UserController@user_index')->name('admin.user');
    Route::get('/notification', function() {
        return view('admin.notification');
    })->name('admin.notification');

    //admin-Project(Project Crud)
    Route::group(['prefix' => 'projects'],function(){
        Route::get('/add/project', 'Admin\ProjectController@add_project_index')->name('project.add');
        Route::post('/add','Admin\ProjectController@add')->name('project.push');
        Route::get('/edit-project/{id}', 'Admin\ProjectController@edit')->name('project.edit');
        Route::post('/update/{id}','Admin\ProjectController@update')->name('project.update');
        Route::get('/view/{id}','Admin\ProjectController@view')->name('project.view');
        Route::get('/delete/{id}','Admin\ProjectController@delete')->name('project.delete');
        Route::get('/member/add/{id}', 'Admin\ProjectController@include_member')->name('member.add');
        Route::get('/add/member/{id}/{pid}','Admin\ProjectController@add_member')->name('member.push');
        Route::get('/member/{id}', 'Admin\ProjectController@remove_member')->name('project.member');
        Route::get('/delete/member/{id}/{pid}','Admin\ProjectController@delete_member')->name('member.pop');
    });

    //Admin User
    Route::group(['prefix' => 'user'],function(){
        Route::get('/edit/{id}', 'Admin\UserController@edit')->name('user.edit');
        Route::post('/update/{id}','Admin\UserController@update')->name('user.update');
        Route::get('/delete/{id}','Admin\UserController@delete')->name('user.delete');
    });
});

Auth::routes();

Route::get('/home', 'User\UserController@home')->name('user.home');

//user routes
Route::group(['prefix' => 'user','middleware' => ['auth']],function(){
    Route::get('/', 'User\UserController@index')->name('user.index');
    Route::get('/manage/task/{id}','User\UserController@manage_task')->name('user.manage')->middleware('managetask');
    Route::get('/add/task/{id}', 'User\TaskController@include_task')->name('task.include');
    Route::post('/add/save/{pid}', 'User\TaskController@save')->name('task.save');
    Route::get('/edit/task/{tid}/{pid}','User\TaskController@edit')->name('task.edit')->middleware('edittask');
    Route::post('/edit/save/{tid}','User\TaskController@store')->name('edit.save');
    Route::get('/delete/{tid}/{pid}','User\TaskController@delete')->name('task.delete');
});