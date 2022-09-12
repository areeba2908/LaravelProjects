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
        $students = Student::all();
        //$students = DB::table('students')->get();
        //$address = Student::find(3)->address; //address record against student id 3 in address table
        $users = DB::table('books')->rightJoin('students', 'student_id', '=', 'students.id')->get();
        //$ifassigned = Book::all('bookname');
        //dd($ifassigned);
        //return $ifassigned->attribute();
        return view('showStudents', compact('students'));
        //$books = Student::find(1)->books; 
        //echo "$users";
    }

    public function showForm()
    {
        return view('showForm');
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function registerStudent(Request $request)
   {
//       $storeData = $request->validate([
//           'name' => 'required|max:255',
//           'email' => 'required|max:255',
//       ]);
//       $student = Student::create($storeData);
        $student = new Student;
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->save();
       return redirect('/showStudents')->with('completed', 'Student has been saved!');
   }

   public function deleteStudent($id)
   {
    Student::find($id)->delete();
    //print_r($student);
    return redirect('/showStudents');
   }

   public function editStudent($id)
   {
    $student = Student::find($id);
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
    $student = Student::find($id);
    $student->name = $request['name'];
    $student->email = $request['email'];
    $student->save();
    return  redirect('/showStudents');
   }
}


