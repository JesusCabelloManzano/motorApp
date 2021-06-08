<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;
    
    const TABLA = 'coche';
    
    protected $table = self::TABLA;
    
    protected $fillable = ['iduser', 'titulo', 'mano', 'tipo_id', 'marca_id', 'anio_id', 'modelo_id', 'precio', 'precioFinanciado', 'km', 'provincia_id', 'cv', 'color', 'combustible', 'puertas', 'cambio', 'plazas', /*'accesorios',*/ 'comentario', 'foto', 'verificado', 'destacado', 'causa'];
    
    protected $attributes = ['causa' => 'nulo'];
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
    }
    
    public function mensajes() {
        return $this->hasMany('App\Models\Mensaje', 'idcoche');
    }
    
    public function tipo() {
        return $this->belongsTo('App\Models\Vehicle_type', 'tipo_id');
    }
    
    public function marca() {
        return $this->belongsTo('App\Models\Make', 'marca_id');
    }
    
    public function anio() {
        return $this->belongsTo('App\Models\Make_year', 'anio_id');
    }
    
    public function modelo() {
        return $this->belongsTo('App\Models\Model_car', 'modelo_id');
    }
    
    public function provincia() {
        return $this->belongsTo('App\Models\State', 'provincia_id');
    }
}
