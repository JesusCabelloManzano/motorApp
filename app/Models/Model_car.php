<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_car extends Model
{
    use HasFactory;
    
    const TABLA = 'model_cars';
    
    protected $fillable = ['name', 'makeyear_id'];
    
    public function makeyear() {
        return $this->belongsTo('App\Models\Make_year', 'makeyear_id');
    }
}