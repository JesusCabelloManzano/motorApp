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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index']);
        $this->middleware('verified')->except(['index']);
        //$this->middleware('verified')->except(['', '']);
        //$this->middleware('auth')->only(...);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $id = auth()->user()->id;
        $country = Country::where('users.id', $id)
                        ->join('users', 'users.country_id', '=', 'countries.id')
                            ->get('countries.name');
        
        $state = State::where('users.id', $id)
                        ->join('users', 'users.state_id', '=', 'states.id')
                            ->get('states.name');
        
        $city = City::where('users.id', $id)
                        ->join('users', 'users.city_id', '=', 'cities.id')
                            ->get('cities.name');
        
        $verified = Auth::user()->hasVerifiedEmail();
        return view('home')->with(['country' => $country, 'state' => $state, 'city' => $city]);
    }
    
    function edit()
    {
        $id = auth()->user()->id;
        $countryName = Country::where('users.id', $id)
                        ->join('users', 'users.country_id', '=', 'countries.id')
                            ->get('countries.name');
        
        $stateName = State::where('users.id', $id)
                        ->join('users', 'users.state_id', '=', 'states.id')
                            ->get('states.name');
        
        $cityName = City::where('users.id', $id)
                        ->join('users', 'users.city_id', '=', 'cities.id')
                            ->get('cities.name');
        
        $data['countries'] = Country::orderby('name')->get(["name","id"]);
        
        $verified = Auth::user()->hasVerifiedEmail();
        
        if( $verified != null ){
           return view('user.edit', $data)->with(['user' => auth()->user(), 'countryName' => $countryName, 'stateName' => $stateName, 'cityName' => $cityName]);
        }
        return redirect()->back()->with('status', 'Por favor, verifique su cuenta para editar su perfil.'); 
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
    
    public function update(UserEditRequest $request)
    {
        //$input = $request->validated();
        $user = auth()->user();
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
        $user->country_id = $request->country;
        $user->state_id = $request->state;
        $user->city_id = $request->city;
        $user->phonenumber = $request->phonenumber;
        try {
            $user->save();
            if($emailChanged) {
                $user->sendEmailVerificationNotification();
                Auth::logout();
            }
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Se ha producido un error al guardar los datos.']);
        }
        return redirect('home')->with(['update' => 'Se han actualizado sus datos con exito']);
        
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
