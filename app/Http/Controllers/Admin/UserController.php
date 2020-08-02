<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function user_index() {
        $users=User::all();
        return view('admin.user',compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('Admin.user.user_edit',compact('user'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->user_type,
        ]);
        return redirect()->route('admin.user');
    }

    public function delete(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
