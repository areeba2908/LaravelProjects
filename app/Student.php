<?php

namespace App;


//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Book;

class Student extends Model
{
 //   use HasFactory;
    protected $fillable = ['name', 'email'];

    //public function books()
    //{
     //   return $this->belongsTo(Book::class);
    //}
    //protected $fillable = ['bookname'];
    public function books()
    {
        return $this->hasMany('App\Book'); //select * from books where user id = 1;
    }

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    //$student->books //select * from books where student id = student id
}
