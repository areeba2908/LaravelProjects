<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Student;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

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
//       $request->validate([
//           'bookname' => 'required',
//       ]);
       $validationError = Helper::validateRequest($request, Book::validationRules);
       //$data =$request->all();
       Book::createBook($request);
       session()->flash('success', 'Book Successfully Registered');
       return redirect('/showBooks');
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
          session()->flash('success', 'Book Assigned');
          return  redirect('/showBooks');
   }

   public function returnBook($id)   ////update, returned to library and updated in db
   {  
          Book::returnBooktoLib($id);
          session()->flash('success', 'Book has been Returned by Student');
          return  redirect('/showBooks');
   }

   public function practiceBook ()   //use this function with /practiceBook
   {
          Book::practiceQueries();
   }
}
