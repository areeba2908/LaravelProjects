<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Student;

class Book extends Model
{
    protected $fillable = ['bookname'];
    const validationRules= [
        'bookname' => 'required'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id'); //select * from Student where bookid = 1;
    }

    public static function getAllBooks()
    {
        $books = Book::all();
        return $books;
    }

    public static function getBookswithUsers() 
    {
        return Book::with('student:id,name')->get(); //joins
        //$books = Book::without('student')->get();
        //$books = Book::doesntHave('student')->get(); //student is 1st function
        //dd($books);
    }

    public static function getBookwithId($id) 
    {
        return Book::find($id);
    }

    public static function createBook($request)
    {
        $book = new Book;
        $book->bookname = $request['bookname'];
        $book->save();
    }

    public static function putBook ($id, $request)  //update, assigned to student and updated in db
    {    
        $book = Book::getBookwithId($id);
        $book->available= 0;
        $book->student_id = $request['student_id'];
        $book->save();
    }

    public static function returnBooktoLib ($id) 
    {
        $book = Book::getBookwithId($id);
        $book->available = 1;
        $book->student_id = null;
        $book->save();
    }

    public static function practiceQueries() //route: /practiceBooks
    {   
        $books = Book::without('student')->get();
        //$books = Book::doesntHave('student')->get(); //student is 1st function
        dd($books);
        //$selectedBookId = $request->get('bookid');
        //$a = Book::find(1);
        //$a = DB::table('books')->where('bookname', 'welcome home')->get();
        //return $a;
        //echo $a->available;
        //$email = DB::table('users')->where('name', 'John')->value('email');
        //$student = Book::findOrFail(99);

    }
    
}
