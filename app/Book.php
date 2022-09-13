<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id'); //select * from Student where bookid = 1;
    }
    public static function getAllBooks() {
        $books = Book::all();
        return $books;

    }

    public static function getBookswithUsers() {
        //$books = Book::without('student')->get();
        //$books = Book::doesntHave('student')->get(); //student is 1st function
        dd($books);
        return Book::with('student:id,name')->get();
    }
    
}
