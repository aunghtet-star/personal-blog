<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(){
       $users=User::all();

       return view('admin-panel.user.index')->with('users',$users);
   }
   public function edit($id){
       $edit = User::find($id);

       return view('admin-panel.user.edit',compact('edit'));
   }
   public function update(Request $request,$id){
       $update = User::find($id);
       $update->update([
           'name'=> $request->name,
           'email'=> $request->email,
           'status'=> $request->status,

       ]);
       return redirect(url('admin/users'))->with('successMsg','You are updated successfully');
   }
   public function delete($id){
        $delete= User::find($id);
        $delete->delete();
        return redirect('/admin/users/')->with('successMsg','You are deleted successfully');
   }
}
