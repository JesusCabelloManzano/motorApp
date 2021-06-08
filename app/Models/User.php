<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const TABLA = 'users';
    
    protected $table = self::TABLA;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'name',
        'surname',
        'country_id',
        'state_id',
        'city_id',
        'phonenumber',
        'rol',
        'password',
        'profilepic',
    ];
    
    protected $attributes = ['rol' => 'user'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function coches() {
        return $this->hasMany('App\Models\Coche', 'iduser');
    }
    
    public function mensajes() {
        return $this->hasMany('App\Models\Mensaje', 'iduser');
    }
    
    public function country() {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
    
    public function state() {
        return $this->belongsTo('App\Models\State', 'state_id');
    }
    
    public function city() {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
