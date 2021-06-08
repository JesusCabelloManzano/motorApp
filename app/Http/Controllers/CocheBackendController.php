<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;

use Validator, Response, Redirect, DB;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CocheCreateRequest;
use App\Http\Requests\CocheEditRequest;
use App\Models\{State, Vehicle_type, Make, Make_year, Model_car, User, Coche};

use Intervention\Image\Facades\Image;
use Storage;

class CocheBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if ($user != null){
            
            $rol = $user->rol;
        
            if( $rol != 'user' ){ 
                
                $nrp = 15;
                //$coches = Coche::all();
                //$coches = Coche::paginate($nrp);
                
                $coches = new Coche;
                $orderby = $request->orderby;
                
                if( $orderby == null ){
                    $coches = $coches -> paginate( $nrp );    
                }else{
                    $coches = $coches -> orderBy( $orderby, 'asc' ) -> paginate( $nrp ); //->appends(['orderby' => $orderby]);    
                }
                
                $fotos = $this->getFotos($coches);
                
                $users = User::all();
                $provincias = State::all();
                $años = Make_year::all();
                $marcas = Make::all();
                $modelos = Model_car::all();
                
                return view('backend.index')->with(['coches' => $coches, 'fotos' => $fotos, 'parametros' => ['orderby' => $orderby], 'users' => $users, 'provincias' => $provincias, 'años' => $años, 'marcas' => $marcas, 'modelos' => $modelos]);
            }
            return redirect('login')->with('status', 'Por favor, inicie sesión con un usuario administrador.');
        }
        return redirect('login')->with('status', 'Por favor, inicie sesión para entrar al backend.');
    }
    
    public function users(Request $request)
    {
        
        $nrp = 15;
        //$coches = Coche::all();
        //$coches = Coche::paginate($nrp);
        
        $users = new User;
        $orderby = $request->orderby;
        
        if( $orderby == null ){
            $users = $users -> paginate( $nrp );    
        }else{
            $users = $users -> orderBy( $orderby, 'asc' ) -> paginate( $nrp ); //->appends(['orderby' => $orderby]);    
        }
        
        return view('backend.users')->with(['users' => $users, 'parametros' => ['orderby' => $orderby]]);
    }
    
    public function userCoches(User $user, Request $request)
    {
        $nrp = 15;
                //$coches = Coche::all();
                //$coches = Coche::paginate($nrp);
                
                $coches = Coche::where('iduser', $user->id)->get();

                $orderby = $request->orderby;
                
                if( $orderby == null ){
                    $coches = Coche::paginate( $nrp )->where('iduser', $user->id);    
                }else{
                    $coches = $coches->orderBy( $orderby, 'asc' ) -> paginate( $nrp ); //->appends(['orderby' => $orderby]);    
                }
                
                $fotos = $this->getFotos($coches);
                
                $provincias = State::all();
                $años = Make_year::all();
                $marcas = Make::all();
                $modelos = Model_car::all();
                
                return view('backend.user.coches')->with(['coches' => $coches, 'fotos' => $fotos, 'parametros' => ['orderby' => $orderby], 'user' => $user, 'provincias' => $provincias, 'años' => $años, 'marcas' => $marcas, 'modelos' => $modelos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coche $coche)
    {
        $user = User::find($coche->iduser);
        $provincia = State::find($coche->provincia_id);
        $año = Make_year::find($coche->anio_id);
        $marca = Make::find($coche->marca_id);
        $modelo = Model_car::find($coche->modelo_id);
        
        return view('backend.coche.show')->with(['coche' => $coche, 'user' => $user, 'provincia' => $provincia, 'año' => $año, 'marca' => $marca, 'modelo' => $modelo, 'fotos' => $this->getFiles($coche)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coche $coche)
    {
        if(auth()->user()->rol == 'user' || auth()->user() != null){
            
            $manos = ['Primera' => 'Primera', 'Segunda' => 'Segunda', 'Tercera o más' => 'Tercera o más'];
            $combustibles = ['gasolina' => 'Gasolina', 'diesel' => 'Diesel', 'electrico' => 'Eléctrico', 'hibrido' => 'Híbrido', 'hibridoEnchufable' => 'Híbrido Enchufable', 'gasLicuado' => 'Gas Liquado', 'gasNatural' => 'Gas Natural', 'otro' => 'Otro'];
            $puertas = ['2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'];
            $cambios = ['automatico' => 'Automático', 'manual' => 'Manual'];
            $plazas = ['2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7+' => '7+'];
            
            $dataComunidades['states'] = State::where("country_id", 205)->orderby('name')->get(["name", "id"]);
            $data['vehicle_types'] = Vehicle_type::get(["name","id"]);
            
            $marcas = Make::where("vehicletype_id",$coche->tipo_id)->orderby('name')->get(["name", "id"]);
            $años = Make_year::where("make_id",$coche->marca_id)->orderby('year')->get(["year", "id"]);
            $modelos = Model_car::where("makeyear_id",$coche->anio_id)->orderby('name')->get(["name", "id"]);
            
            return view('backend.coche.edit', $data, $dataComunidades)->with(['coche' => $coche, 'fotos' => $this->getFiles($coche), 'user' => auth()->user(), 'manos' => $manos, 'combustibles' => $combustibles, 'puertas' => $puertas, 'cambios' => $cambios, 'plazas' => $plazas, 'marcas' => $marcas, 'años' => $años, 'modelos' => $modelos]);
        } else {
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coche $coche)
    {
        if($request->set){
            $imagen = $this->reduceImage(asset(Storage::url($request->set)));
            $coche->foto = base64_encode($imagen);
            $coche->save();
        }
        $this->uploadFiles($request, 'fotos', $coche);
        if($request->unset){
            Storage::delete($request->unset);
        }
        if($request->has('unsetcover')){
            $coche->foto = null;
            $coche->save();
        }
        
        $coche->titulo = $request->titulo;
        $coche->tipo_id = $request->tipo_id;
        $coche->marca_id = $request->marca_id;
        $coche->anio_id = $request->anio_id;
        $coche->modelo_id = $request->modelo_id;
        $coche->mano = $request->mano;
        $coche->km = $request->km;
        $coche->precio = $request->precio;
        $coche->precioFinanciado = $request->precioFinanciado;
        $coche->cv = $request->cv;
        $coche->combustible = $request->combustible;
        $coche->cambio = $request->cambio;
        $coche->color = $request->color;
        $coche->puertas = $request->puertas;
        $coche->plazas = $request->plazas;
        $coche->provincia_id = $request->provincia_id;
        $coche->comentario = $request->comentario;
        $coche->verificado = $request->verificado;
        $coche->destacado = $request->destacado;
        $coche->causa = $request->causa;
        try {
            $coche->save();
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Se ha producido un error al guardar los datos.']);
        }
        return redirect('backend/coche/'. $coche->id)->with(['update' => 'Se han actualizado los datos del vehiculo con exito']);
    }
    
    public function getFiles(Coche $coche)
    {
        return Storage::files('public/images/'. $coche->iduser . '/' . $coche->id);
        //return Storage::allfiles('public/images/'. $coche->iduser . '/' . $coche->id);
    }
    
    private function reduceImage($path) {
        $img = Image::make($path);
        $img->resize(200, null, function ($constraint){
            $constraint->aspectRatio();
        });
        $jpg = (string) $img->encode('jpg', 75);
        return $jpg;
    }
    
    private function getFirstFile(Coche $coche) {
        $file = null;
        $files = $this->getFiles($coche);
        if(isset($files[0])) {
            $file = $files[0];
        }
        return $file;
    }
    
    private function getFotos($coches) {
        $fotos = [];
        foreach( $coches as $coche){
            if($coche->foto == null) {
                $fotos[$coche->id] = $this->getFirstFile($coche);
            } else {
                $fotos[$coche->id] = null;
            }
        }
        return $fotos;
    }
    
    private function uploadFiles(Request $request, string $name, Coche $coche) 
    {
        if($request->hasFile($name)) {
            $contador = 0;
            foreach($request->file($name) as $file) {
                $fecha = new \DateTime();
                $nombre = $fecha->getTimestamp() . $contador . '.' . $file->extension(); //nombre con el que se guarda el archivo en el storage
                $contador++;
                $file->storeAs('public/images/'. $coche->iduser . '/' . $coche->id, $nombre);
            }
        }
    }
    
}
