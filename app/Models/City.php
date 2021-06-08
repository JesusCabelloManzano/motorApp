<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    const TABLA = 'cities';
    
    protected $table = self::TABLA;
    
    protected $fillable = ['name', 'state_id'];

    public function state() {
        return $this->belongsTo('App\Models\State', 'state_id');
    }
}
