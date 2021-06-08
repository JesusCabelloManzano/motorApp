<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    
    const TABLA = 'countries';
    
    protected $table = self::TABLA;
    
    protected $fillable = ['sortname', 'name', 'phonecode'];
    
    public function states() {
        return $this->hasMany('App\Models\State', 'country_id');
    }
}
