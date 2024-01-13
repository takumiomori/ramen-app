<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Guest extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'guest_name' => ['required','string','min:8','regex:/^[A-Za-z0-9!@#$%^&*()_+]+$/'],
        'mail' => ['required','regex:/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/'],
        'tel' => ['required', 'regex:/^[0-9-]+$/'],
        'password' => ['required','string','min:8','regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]+$/']
    );

    public function favorite(){
        return $this->hasMany('App\Models\Favorite');
    }

    public function post(){
        return $this->hasMany('App\Models\Post');
    }


}
