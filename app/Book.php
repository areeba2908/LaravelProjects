<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class); //select * from Student where bookid = 1;
    }
    
}
