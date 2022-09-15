<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); //select * from User where user_id = 1;
    }

    public static function validateReview ($request)
    {
        $request->validate([
            'bookname'=>'required',
            'addANote'=>'required',
        ]);
    }

    public static function addNewPost($request,$id)
    {
        $newreview = new Review;
        $newreview->reviews = $request['addANote'];
        $newreview->book = $request['bookname'];
        $newreview->user_id = $id;
        $newreview->save();
    }

    public static function getReviewsForUsers() {
        return Review::with('user:id,name')->get(); //calling user from above function
    }
}
