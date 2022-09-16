<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Student;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function showBooks()
    {
          $books = Book::getBookswithUsers();
          return view('books.showBooks', compact('books'));
    }

    public function bookForm()
    {
          return view('books.bookForm');
     }

    public function registerBook(Request $request)
   {
          $data =$request->all();    
          Book::createBook($data);
          return redirect('/showBooks')->with('completed', 'Student has been saved!');
   }

   public function assignBook($id)       //open view to assign book
    {
          $book = Book::getBookwithId($id);
          $students = Student::getStudents();
          return view('books.assignBook', compact('book','students'));
    }

    public function updateBook( $id, Request $request) //update, assigned to student and updated in db
   {
          $data =$request->all();   
          Book::putBook($id,$data);
          return  redirect('/showBooks');
   }

   public function returnBook($id)   ////update, returned to library and updated in db
   {  
          Book::returnBooktoLib($id);
          return  redirect('/showBooks');
   }

   public function practiceBook ()   //use this function with /practiceBook
   {
          Book::practiceQueries();
   }
}
