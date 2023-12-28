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
        'guest_name' => 'required',
        'mail' => 'required',
        'tel' => 'required',
        'password' => 'required',
    );

    public function favorite(){
        return $this->hasMany('App\Models\Favorite');
    }

    public function post(){
        return $this->hasMany('App\Models\Post');
    }


}
