<?php

namespace App;


//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Book;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'email'];

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

    public static function validateStudent ($request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            ]);
    }

    public static function getStudents () {
        return Student::all();
    }

    public static function getStudentwithId ($id) {
        return Student::find($id);
    }

    public static function createStudent ($request){
        Student::create(array('name'=>$request['name'], 'email'=>$request['email']));
        //$student = new Student;
        //$student->name = $request['name'];
        //$student->email = $request['email'];
        //$student->save();
        //Student::create(request(['name', 'email']));
    }

    public static function putStudent ($request,$id){
        $student = Student::find($id);
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->save();
    }

    public static function deleteStudent($id){
        Student::find($id)->delete();
    }
}
