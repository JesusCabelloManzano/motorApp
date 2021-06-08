<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    
    const TABLA = 'states';
    
    protected $table = self::TABLA;
    
    protected $fillable = ['name', 'country_id'];
    
    public function country() {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
    
    public function cities() {
        return $this->hasMany('App\Models\City', 'state_id');
    }
}
