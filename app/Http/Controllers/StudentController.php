<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Book;
use Illuminate\Support\Facades\DB;
use Session;

class StudentController extends Controller
{
    public function showStudents()
    {
        $students = Student::getStudents();
        return view('students.showStudents', compact('students'));
        //$users = DB::table('books')->rightJoin('students', 'student_id', '=', 'students.id')->get();
        //$address = Student::find(3)->address; //address record against student id 3 in address table
        //$ifassigned = Book::all('bookname');
        //return $ifassigned->attribute();
        //$books = Student::find(1)->books; 
    }

    public function showForm()
    {
        return view('students.showForm');
    }

   public function registerStudent(Request $request)
   {           
        try {
          Student::validateStudent($request);
          Student::createStudent($request);
          session()->flash('success', 'Student Successfully Registered');
          return redirect('/showStudents');
        }
        catch(\Exception $e) {
          Session::flash('error', json_encode($e->getMessage(), true));
          //echo 'Message: ' .$e->getMessage();
        }
        return redirect()->back();
   }

   public function editStudent($id)
   {
        $student = Student::getStudentwithId($id);
        $data = compact('student');
        return view('students.editForm')->with($data);
   }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function updateStudent($id, Request $request)
   {
        $data =$request->all();
        Student::putStudent($data,$id);
        session()->flash('success', 'Student Details updated.');
        return  redirect('/showStudents');
   }

   public function deleteStudent($id)
   {
     Student::deleteStudent($id);
     session()->flash('success', 'Student deleted.');
     return redirect('/showStudents');
   }

   public function softDeleteStudent($id)  //soft delete
   {
     Student::deleteStudent($id);
     session()->flash('success', 'Student deleted.');
     return redirect('/showStudents');
   }

   public static function restoreAllSoftDeletes() 
   {
     Student::onlyTrashed()->restore();
     return redirect()->back();
     }
}


