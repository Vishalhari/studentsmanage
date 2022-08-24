<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;


// Models
use App\Models\Teacher;
use App\Models\Student;
use App\Models\marks;
use App\Models\Terms;

class MarksController extends Controller
{
    // Marks List
    public function index()
    {
        $data['marks'] = marks::select('id','studentId','mathsmark','sciencemark','historymark','termId','created_at')
                         ->with([
                         'studentlist' => function($query){
                            $query->select('id','fullname');
                         },
                         'terms' => function($query2){
                            $query2->select('id','termname');
                         }
                         ])
                         ->get();
        return view('marks/index',$data);
    }

    // Add marks
    public function addmarks()
    {
        $data['students'] = Student::select('id','fullname','age','gender','teacherId')->get();
        $data['terms'] = Terms::select('id','termname')->get(); 
        return view('marks/addmark',$data);
    }


    public function storemarks(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'studentid'=>'required',
            'termid'=>'required',
            'mathsmark'=>'required',
            'sciencemark'=>'required',
            'historymark'=>'required'
        ]);

        if ($validator -> fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $obj_marks = new marks(); 
            $obj_marks->studentId    = $request->studentid;
            $obj_marks->termId         = $request->termid;
            $obj_marks->mathsmark      = $request->mathsmark;
            $obj_marks->sciencemark   = $request->sciencemark;
            $obj_marks->historymark   = $request->historymark;
            $obj_marks->save();
            
            Session::flash('message', 'Marks Successully Added ');
            return redirect('markslist');
        }
    }


    // Edit marks
    public function editmarks($id)
    {
        $data['students'] = Student::select('id','fullname','age','gender','teacherId')->get();
        $data['terms'] = Terms::select('id','termname')->get(); 
        $data['marks'] = marks::select('id','studentId','mathsmark','sciencemark','historymark','termId','created_at')
                         ->where('id',$id)
                         ->first();
        return view('marks/editmarks',$data);
    }


    // update marks
    public function updatemarks($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'studentid'=>'required',
            'termid'=>'required',
            'mathsmark'=>'required',
            'sciencemark'=>'required',
            'historymark'=>'required'
        ]);

        if ($validator -> fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $obj_marks = marks::find($id); 
            $obj_marks->studentId    = $request->studentid;
            $obj_marks->termId         = $request->termid;
            $obj_marks->mathsmark      = $request->mathsmark;
            $obj_marks->sciencemark   = $request->sciencemark;
            $obj_marks->historymark   = $request->historymark;
            $obj_marks->save();
            
            Session::flash('message', 'Marks Updated Successully  ');
            return redirect('markslist');
        }
    }

    // delete marks
    public function deletemarks($id)
    {
        marks::find($id)->delete();
        Session::flash('message', 'Marks Deleted Successully ');
        return redirect('markslist');
    }




}
