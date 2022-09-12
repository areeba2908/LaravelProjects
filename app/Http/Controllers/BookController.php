<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function showBooks()
    {
        //$student = Book::findOrFail(99);
        //$books = Book::get();
        $users = DB::table('students')->rightJoin('books', 'student_id', '=', 'students.id')->get();

        return view('showBooks', compact('users'));
        //return $student; //return JSON
    }

    public function bookForm()
    {
        return view('bookForm');
    }

    public function registerBook(Request $request)
   {
        $book = new Book;
        $book->bookname = $request['bookname'];
        
        $book->save();
       return redirect('/showBooks')->with('completed', 'Student has been saved!');
   }

   public function assignBook($id)
    {
        $book = Book::find($id);
        //$books = DB::table('books')->get();
        $students = DB::table('students')->get();
        return view('assignBook', compact('book','students'));
    }

    public function updateBook( $id, Request $request) //assigned
   {
    //$selectedBookId = $request->get('bookid');
    $book = Book::find($id);
    $book->available= 0;
    $book->student_id = $request['student_id'];
    $book->save();
    return  redirect('/showBooks');
   }

   public function returnBook($id)
   {
    $book = Book::find($id);
    $book->available = 1;
    $book->student_id = null;
    $book->save();
    return  redirect('/showBooks');
   }

   public function practiceBook ()
   {
    //$a = Book::find(1);
    $a = DB::table('books')->where('bookname', 'welcome home')->get();
    return $a;
    //echo $a->available;
    //$email = DB::table('users')->where('name', 'John')->value('email');
    //return view('assignBook', ['article' => $bookname]);

   }
}
