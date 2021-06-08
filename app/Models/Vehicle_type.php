<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_type extends Model
{
    use HasFactory;
    
    const TABLA = 'vehicle_types';
    
    protected $fillable = ['name'];
    
    public function makes() {
        return $this->hasMany('App\Models\Make', 'vehicletype_id');
    }
}