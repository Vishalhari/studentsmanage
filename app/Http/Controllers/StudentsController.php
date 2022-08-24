<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;


// Models
use App\Models\Teacher;
use App\Models\Student;

class StudentsController extends Controller
{
    // Students List
    public function index()
    {
        $data['students'] = Student::select('id','fullname','age','gender','teacherId')
                            ->with([
                            'teachers' => function($query){
                                $query->select('id','fullname');
                            }
                            ])
                            ->get(); 
        return view('students/index',$data);
    }

    // Create Students
    public function create()
    {
        $data['teachers'] = Teacher::select('id','fullname')->get();
        return view('students/create',$data);
    }


    // create student
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'teacherid'=>'required'
        ]);
        if ($validator -> fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $obj_student = new Student(); 
            $obj_student->fullname    = $request->fullname;
            $obj_student->age         = $request->age;
            $obj_student->gender      = $request->gender;
            $obj_student->teacherId   = $request->teacherid;
            $obj_student->save();
            
            Session::flash('message', 'Student Successully Added ');
            return redirect('/');
        }
    }


    // Edit Students
    public function edit($id)
    {
        $data['teachers'] = Teacher::select('id','fullname')->get();
        $data['student'] = Student::select('id','fullname','age','gender','teacherId')
                           ->where('id',$id)
                           ->first(); 
        return view('students/edit',$data);
    }


    // update student
    public function UpdateStudent($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'teacherid'=>'required'
        ]);
        if ($validator -> fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $obj_student = Student::find($id); 
            $obj_student->fullname    = $request->fullname;
            $obj_student->age         = $request->age;
            $obj_student->gender      = $request->gender;
            $obj_student->teacherId   = $request->teacherid;
            $obj_student->save();

            Session::flash('message', 'Student Updated Successully ');
            return redirect('/');
        }
    }


    public function DeleteStudent($id)
    {
        Student::find($id)->delete();
        Session::flash('message', 'Student Deleted Successully ');
        return redirect('/');

    }
}
