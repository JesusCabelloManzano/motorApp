<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;

use Validator, Response, Redirect, DB;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserEditRequest;
use App\Models\{Country, State, City, User};

use Intervention\Image\Facades\Image;
use Storage;

class HomeBackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('root')->only(['edit', 'update']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        $id = $user -> id;
        
        $country = Country::where('users.id', $id)
                        ->join('users', 'users.country_id', '=', 'countries.id')
                            ->get('countries.name');
        
        $state = State::where('users.id', $id)
                        ->join('users', 'users.state_id', '=', 'states.id')
                            ->get('states.name');
        
        $city = City::where('users.id', $id)
                        ->join('users', 'users.city_id', '=', 'cities.id')
                            ->get('cities.name');
        
        return view('backend.user.profile')->with(['user' => $user, 'country' => $country, 'state' => $state, 'city' => $city]);
    }
    
    function edit(User $user)
    {
        
        $id = $user->id;

        $roles = ['root' => 'Root', 'advanced' => 'Avanzado', 'operator' => 'Editor', 'user' => 'Usuario'];
        
        $data['countries'] = Country::orderby('name')->get(["name","id"]);

        return view('backend.user.edit', $data)->with(['user' => $user, 'roles' => $roles]);
    }
    
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->orderby('name')->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->orderby('name')->get(["name", "id"]);
        return response()->json($data);
    }
    
    public function update(UserEditRequest $request, User $user)
    {
        //$input = $request->validated();
        if($request->hasFile('profilepic') && $request->file('profilepic')->isValid()) {
            $archivo = $request->file('profilepic');
            $path = $archivo->getRealPath();
            $imagen = $this->reduceImage($path);
            $user->profilepic = base64_encode($imagen);
        }
        if($request->password != null || $request->newpassword != null) {
            //Hash::check($request->password, $user->password)
            //password_verify($request->password, $user->password)
            if($request->password == null || $request->newpassword == null || !password_verify($request->password, $user->password)) {
                return back()->withInput()->withErrors(['password' => 'La clave de acceso anterior no es correcta.']);
            }
            $user->password = Hash::make($request->newpassword);
        }
        $emailChanged = false;
        $user->username = $request->username;
        if($user->email != $request->email) {
            $emailChanged = true;
            $user->email = $request->email;
            $user->email_verified_at = null;
        }
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->city_id = $request->city_id;
        $user->rol = $request->rol;
        $user->phonenumber = $request->phonenumber;
        try {
            $user->save();
            if($emailChanged) {
                $user->sendEmailVerificationNotification();
            }
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Se ha producido un error al guardar los datos.']);
        }
        return redirect('/backend/profile/' . $user->id)->with(['update' => 'Se han actualizado sus datos con exito']);
        
    }
    
    private function reduceImage($path) {
        $img = Image::make($path);
        $img->resize(200, null, function ($constraint){
            $constraint->aspectRatio();
        });
        $jpg = (string) $img->encode('jpg', 75);
        return $jpg;
    }
    
    public function destroy()
    {
        //
    }
    
}
