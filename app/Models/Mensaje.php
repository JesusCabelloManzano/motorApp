<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    
    const TABLA = 'mensaje';
    
    protected $table = self::TABLA;
    
    protected $fillable = ['iduser', 'idcoche', 'mensaje', 'nombre', 'email', 'telefono'];
    
    public function coche() {
        return $this->belongsTo('App\Models\Coche', 'idcoche');
    }
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
    }
}
