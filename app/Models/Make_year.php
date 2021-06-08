<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make_year extends Model
{
    use HasFactory;
    
    const TABLA = 'make_years';
    
    protected $fillable = ['name', 'make_id'];
    
    public function make() {
        return $this->belongsTo('App\Models\Make', 'make_id');
    }
    
    public function models() {
        return $this->hasMany('App\Models\Models', 'makeyears_id');
    }
}