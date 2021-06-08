<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;
    
    const TABLA = 'makes';
    
    protected $fillable = ['name', 'vehicletype_id'];
    
    public function vehicletype() {
        return $this->belongsTo('App\Models\Vehicle_type', 'vehicletype_id');
    }
    
    public function year() {
        return $this->hasMany('App\Models\Make_year', 'make_id');
    }
}