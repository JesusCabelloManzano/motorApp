<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    public function attributes() {
        return [
            'profilepic'    => 'foto de usuario',
            'username'      => 'nombre de usuario',
            'email'         => 'correo electrónico',
            'name'          => 'nombre',
            'surname'       => 'apellidos',
            'country_id'    => 'pais del usuario',
            'state_id'      => 'ciudad del usuario',
            'city_id'       => 'localidad del usuario',
            'newpassword'   => 'clave de acceso',
            'rol'           => 'rol del usuario'
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
        $confirmed  = 'No coinciden las dos claves de acceso.';
        $email      = 'El campo \':attribute\' no tiene el formato de correo requerido.';
        $max        = 'La longitud máxima del campo \':attribute\' es de :max caracteres.';
        $min        = 'La longitud mínima del campo \':attribute\' es de :min caracteres.';
        $maxFoto    = 'La longitud máxima del campo \':attribute\' es de :max MB.';
        $mimes      = 'Sólo se pueden subir imágenes.';
        $regex      = 'El campo \':attribute\' debe tener el formato de un telefono.';
        $required   = 'El campo \':attribute\' es obligatorio.';
        $string     = 'El campo \':attribute\' tiene que ser una cadena de caracteres.';
        $int        = 'El campo \':attribute\' tiene que ser un numero entero.';
        $unique     = 'El correo electrónico ya está siendo usado por otro usuario.';
        return [
            'profilepic.mimes'      => $mimes,
            'profilepic.max'        => $maxFoto,
            'username.required'     => $required,
            'username.max'          => $max,
            'email.required'        => $required,
            'email.string'          => $string,
            'email.max'             => $max,
            'email.email'           => $email,
            'email.unique'          => $unique,
            'name.string'           => $string,
            'name.max'              => $max,
            'surname.string'        => $string,
            'surname.max'           => $max,
            'country_id.int'        => $int,
            'state_id.int'          => $int,
            'city_id.int'           => $int,
            'newpassword.string'    => $string,
            'newpassword.min'       => $min,
            'newpassword.confirmed' => $confirmed,
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->user;
        if($this->user == null){
            $id = auth()->user()->id;
        }else{
            $id = $this->user->id;
        }
        //https://stackoverflow.com/questions/40942367/how-validate-unique-email-out-of-the-user-that-is-updating-it-in-laravel
        return [
            'profilepic'    => 'nullable|mimes:jpeg,jpg,png,gif,webp,raw|max:200',
            'username'      => 'required|max:40',
            'email'         => 'required|string|max:255|email|unique:users,email,' . $id,
            'name'          => 'nullable|string|max:255',
            'surname'       => 'nullable|string|max:255',
            'country_id'    => 'nullable|int',
            'state_id'      => 'nullable|int',
            'city_id'       => 'nullable|int',
            'phonenumber'   => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|max:13',
            'newpassword'   => 'nullable|string|min:8|confirmed',
            'rol'           => 'nullable|in:root,advanced,operator,user',
        ];
    }
    
}