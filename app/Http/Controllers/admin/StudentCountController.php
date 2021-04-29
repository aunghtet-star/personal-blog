<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StudentCount;
use Illuminate\Http\Request;

class StudentCountController extends Controller
{
   public function index(){
       $student_counts=StudentCount::all();
       $student = StudentCount::find(1);
       return view('admin-panel.student_counts.index',compact('student_counts','student'));
   }
   public function store(Request $request){
       $request->validate([
           'count'=>'required'
       ]);
       StudentCount::create([
           'count'=>$request->count
       ]);
       return back();
   }
   public function update(Request $request ,$id){
      $student=StudentCount::find(1);
      $count = $student->count;
      $student->update([
          'count'=>$count+$request->count,
      ]);
      return back();
   }
}
