<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class); //select * from books where user id = 1;
    }

    public static function validateUser ($request) {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
    }

    public static function getUsersForReviews() {
        return User::with('reviews')->get();
        //$users= DB::table('users')->rightJoin('reviews', 'user_id', '=', 'users.id')->get();
        //return $users;
    }

    public static function createUsers($request) {
        $user = User::create(array('name'=>$request['name'], 'email'=>$request['email'],'password'=>Hash::make($request['password'])));
        return $user;
    }
}
