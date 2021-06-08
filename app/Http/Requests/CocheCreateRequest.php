<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CocheCreateRequest extends FormRequest
{
    public function attributes() {
        return [
            'titulo'           => 'titulo del anuncio',
            'mano'             => 'calidad del vehiculo',
            'tipo_id'          => 'tipo de vehiculo',
            'marca_id'         => 'marca del vehiculo',
            'anio_id'          => 'año del vehiculo',
            'modelo_id'        => 'modelo del vehiculo',
            'precio'           => 'precio del vehiculo',
            'km'               => 'kilometros del vehiculo',
            'provincia_id'     => 'provincia del usuario/vehiculo',
            'cv'               => 'caballaje del vehiculo',
            'combustible'      => 'combustible que usa el vehiculo',
            'cambio'           => 'tipo de cambio que usa el vehiculo',
            'color'            => 'color del vehiculo',
            'puertas'          => 'cuantas puertas tiene el vehiculo',
            'plazas'           => 'cuantas plazas tiene el vehiculo',
            'comentario'       => 'descripcion mas extensa del vehiculo',
            'foto'             => 'fotografía del vehiculo',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages() {
        $digits         = 'El campo \':attribute\' no debe tener mas de :digits dígitos.';
        $digitsBetween  = 'El valor del campo \':attribute\' es :input y debe tener entre :min y :max dígitos.';
        $gte            = 'El valor del campo \':attribute\' es :input y debe ser mayor o igual que :value.';
        $in             = 'El campo \':attribute\' no tiene el valor correcto, los valores permitidos son: :values.';
        $int            = 'El campo \':attribute\' tiene que ser un numero entero.';
        $max            = 'La longitud máxima del campo \':attribute\' es de :max caracteres.';
        $maxFoto        = 'La longitud máxima del campo \':attribute\' es de :max KB.';
        $mimes          = 'Sólo se pueden subir imágenes.';
        $min            = 'La longitud mínima del campo \':attribute\' es de :min caracteres.';
        $regex          = 'El campo \':attribute\' debe tener el formato de moneda.';
        $required       = 'El campo \':attribute\' es obligatorio.';
        return [
            'titulo.required'    => $required,
            'tipo_id.required'   => $required,
            'marca_id.required'  => $required,
            'anio_id.required'   => $required,
            'modelo_id.required' => $required,
            'precio.required'    => $required,
            'km.required'        => $required,
            'cambio.required'    => $required,
            'color.required'     => $required,
            'tipo_id.int'        => $int,
            'marca_id.int'       => $int,
            'anio_id.int'        => $int,
            'modelo_id.int'      => $int,
            'provincia_id.int'   => $int,
            'titulo.max'         => $max,
            'color.max'          => $max,
            'comentario.max'     => $max,
            'foto.max'           => $maxFoto,
            'precio.gte'         => $gte,
            'km.gte'             => $gte,
            'cv.gte'             => $gte,
            'precio.regex'       => $regex,
            'anio.digits'        => $digits,
            'km.digits_between'  => $digitsBetween,
            'cv.digits_between'  => $digitsBetween,
            'mano.in'            => $in,
            'combustible.in'     => $in,
            'cambio.in'          => $in,
            'puertas.in'         => $in,
            'plazas.in'          => $in,
            'foto.mimes'         => $mimes,
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'           => 'required|max:150',
            'mano'             => 'nullable|in:Primera,Segunda,Tercera o más',
            'tipo_id'          => 'required|int',
            'marca_id'         => 'required|int',
            'anio_id'          => 'required|int',
            'modelo_id'        => 'required|int',
            'precio'           => 'required|gte:0.01|regex:/^\d{1,8}(\.\d{0,2})?$/',
            'km'               => 'required|digits_between:1,7|gte:1',
            'provincia_id'     => 'nullable|int',
            'cv'               => 'nullable|digits_between:1,5|gte:1',
            'combustible'      => 'nullable|in:gasolina,diesel,electrico,hibrido,hibridoEnchufable,gasLicuado,gasNatural,otro',
            'cambio'           => 'required|in:automatico,manual',
            'color'            => 'required|max:40',
            'puertas'          => 'nullable|in:2,3,4,5,6',
            'plazas'           => 'nullable|in:2,3,4,5,6,7+',
            'comentario'       => 'nullable|max:3000',
            'foto'             => 'nullable|mimes:jpeg,jpg,png,gif,webp,raw|max:200',
        ];
    }
    
    
}