<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'guest_name' => ['required','string','min:8','regex:/^[A-Za-z0-9!@#$%^&*()_+]+$/'],
        'mail' => ['required','regex:/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/'],
        'tel' => ['required', 'regex:/^[0-9-]+$/'],
        'password' => ['required','string','min:8','regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]+$/']
    );

    protected $fillable = [
        'name',
        'guest_name',
        'mail',
        'tel',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function favorite(){
        return $this->hasMany('App\Models\Favorite');
    }

    public function post(){
        return $this->hasMany('App\Models\Post');
    }
}
