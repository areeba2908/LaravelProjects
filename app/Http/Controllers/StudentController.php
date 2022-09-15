<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Book;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudents()
    {
        $students = Student::getStudents();
        return view('showStudents', compact('students'));
        //$users = DB::table('books')->rightJoin('students', 'student_id', '=', 'students.id')->get();
        //$address = Student::find(3)->address; //address record against student id 3 in address table
        //$ifassigned = Book::all('bookname');
        //return $ifassigned->attribute();
        //$books = Student::find(1)->books; 
    }

    public function showForm()
    {
        return view('showForm');
    }

   public function registerStudent(Request $request)
   {           
        Student::validateStudent($request);
        Student::createStudent($request);
        return redirect('/showStudents')->with('completed', 'Student has been saved!');
   }

   public function editStudent($id)
   {
        $student = Student::getStudentwithId($id);
        $data = compact('student');
        return view('/editForm')->with($data);
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
        return  redirect('/showStudents');
   }

   public function deleteStudent($id)
   {
     Student::deleteStudent($id);
     return redirect('/showStudents');
   }

   public function softDeleteStudent($id)  //soft delete
   {
     Student::find($id)->delete();
     return redirect('/showStudents');
   }

   public static function restoreAllSoftDeletes() 
   {
     Student::onlyTrashed()->restore();
     return redirect()->back();
     }
}


