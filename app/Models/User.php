<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
// use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = ['role', 'name', 'email', 'secondary_email', 'phone', 'secondary_phone', 'dob', 'password', 'photo', 'status', 'slug', 'deleted_at', 'created_at', 'updated_at'];

    public $error;

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

    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = Hash::make($password);
    // }

    public function teacher()
    {
        return $this->hasOne('App\Models\Teacher', 'user_id', 'id');
    }

    public function teacherCourse()
    {
        return $this->hasMany('App\Models\TeacherCourse', 'user_id', 'id');
    }

    public function teacherCourseLevel()
    {
        return $this->hasMany('App\Models\TeacherCourseLevel', 'user_id', 'id');
    }

    public function teacherSubject()
    {
        return $this->hasMany('App\Models\TeacherSubject');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'user_id', 'id')->where('status',1)->where('product_type_id',2)->whereNull('deleted_at');
    }

    public function allProduct()
    {
        return $this->hasMany('App\Models\Product', 'user_id', 'id')->where('status',1)->whereNull('deleted_at');
    }

    public function billAddress()
    {
        return $this->hasOne('App\Models\Address')->where('type', 'billing');
    }

    public function shipAddress()
    {
        return $this->hasOne('App\Models\Address')->where('type', 'shipping');
    }

}
