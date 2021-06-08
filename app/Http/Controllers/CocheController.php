<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;

use Validator, Response, Redirect, DB;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CocheCreateRequest;
use App\Http\Requests\CocheEditRequest;
use App\Models\{State, Vehicle_type, Make, Make_year, Model_car, User, Coche, Mensaje};

use Intervention\Image\Facades\Image;
use Storage;
use Mail;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
    function all(Request $request) {
        $nrp = 8;
        
        $orderby = 'id';
        
        $parametros = [];
        
        $minKm = ''; 
        $maxKm = ''; 
        $minPrecio = ''; 
        $maxPrecio = ''; 
        $minCv = ''; 
        $maxCv = ''; 
        $color = '';
        $ordenado = '';
        
        $parametros += ['minKm' => $minKm, 'maxKm' => $maxKm, 'minPrecio' => $minPrecio, 'maxPrecio' => $maxPrecio, 'minCv' => $minCv, 'maxCv' => $maxCv, 'color' => $color, 'ordenado' => $ordenado];
        
        $direction = 'desc';
        
        $manos = ['Primera' => 'Primera', 'Segunda' => 'Segunda', 'Tercera o más' => 'Tercera o más'];
        $combustibles = ['gasolina' => 'Gasolina', 'diesel' => 'Diesel', 'electrico' => 'Eléctrico', 'hibrido' => 'Híbrido', 'hibridoEnchufable' => 'Híbrido Enchufable', 'gasLicuado' => 'Gas Liquado', 'gasNatural' => 'Gas Natural', 'otro' => 'Otro'];
        $puertas = ['2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'];
        $cambios = ['automatico' => 'Automático', 'manual' => 'Manual'];
        $plazas = ['2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7+' => '7+'];
        
        $data['vehicle_types'] = Vehicle_type::get(["name","id"]);

        if(isset($request->ordenado)){
            if($request->ordenado == "anuncioNuevo"){
                $orderby = 'id';
                $direction = 'desc';
                $ordenado = $request->ordenado;
            }else if($request->ordenado == "anuncioAntiguo"){
                $orderby = 'id';
                $direction = 'asc';
                $ordenado = $request->ordenado;
            }else if($request->ordenado == "cocheNuevo"){
                $orderby = 'mano';
                $direction = 'asc';
                $ordenado = $request->ordenado;
            }else if($request->ordenado == "cocheAntiguo"){
                $orderby = 'mano';
                $direction = 'desc';
                $ordenado = $request->ordenado;
            }
        }
        if(isset($request->tipo) || isset($request->provincia) || isset($request->mano) || !empty($request->minKm) 
            || !empty($request->maxKm) || !empty($request->minPrecio) || !empty($request->maxPrecio) || !empty($request->minCv) ||
                !empty($request->maxCv) || !empty($request->color) || isset($request->cambio) || isset($request->combustible) || isset($request->plazas) || isset($request->puertas)){

            if(isset($request->tipo)){
                $tipo = $request->tipo;
                $parametros += ['tipo' => $tipo];
                if(isset($request->marca)){
                    $marca = $request->marca;
                    $parametros += ['marca' => $marca];
                    if(isset($request->año)){
                        $año = $request->año;
                        $parametros += ['año' => $año];
                        if(isset($request->modelo)){
                            $modelo = $request->modelo;
                            $parametros += ['modelo' => $modelo];
                            $coches = Coche::where('modelo_id', $request->modelo)->orderBy($orderby, $direction)->paginate( $nrp );
                        }else
                        $coches = Coche::where('anio_id', $request->año)->orderBy($orderby, $direction)->paginate( $nrp );
                    }else
                    $coches = Coche::where('marca_id', $request->marca)->orderBy($orderby, $direction)->paginate( $nrp );
                }else
                $coches = Coche::where('tipo_id', $request->tipo)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(isset($request->provincia)){
                $provincia = $request->provincia;
                $parametros += ['provincia' => $provincia];
                $coches = Coche::where('provincia_id', $request->provincia)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(isset($request->mano)){
                $mano = $request->mano;
                $parametros += ['mano' => $mano];
                $coches = Coche::where('mano', $request->mano)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(!empty($request->minKm)){
                $minKm = $request->minKm;
                $parametros += ['minKm' => $minKm];
                $coches = Coche::where('km', '=>', $request->minKm)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(!empty($request->maxKm)){
                $maxKm = $request->maxKm;
                $parametros += ['maxKm' => $maxKm];
                $coches = Coche::where('km', '<=', $request->maxKm)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(!empty($request->minPrecio)){
                $minPrecio = $request->minPrecio;
                $parametros += ['minPrecio' => $minPrecio];
                $coches = Coche::where('precio', '=>', $request->minPrecio)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(!empty($request->maxPrecio)){
                $maxPrecio = $request->maxPrecio;
                $parametros += ['maxPrecio' => $maxPrecio];
                $coches = Coche::where('precio', '<=', $request->maxPrecio)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(!empty($request->minCv)){
                $minCv = $request->minCv;
                $parametros += ['minCv' => $minCv];
                $coches = Coche::where('cv', '=>', $request->minCv)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(!empty($request->color)){
                $color = $request->color;
                $parametros += ['color' => $color];
                $coches = Coche::where('color', $request->color)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(isset($request->cambio)){
                $cambio = $request->cambio;
                $parametros += ['cambio' => $cambio];
                $coches = Coche::where('cambio', $request->cambio)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(isset($request->combustible)){
                $combustible = $request->combustible;
                $parametros += ['combustible' => $combustible];
                $coches = Coche::where('combustible', $request->combustible)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(isset($request->plazas)){
                $plaza = $request->plazas;
                $parametros += ['plazas' => $plaza];
                $coches = Coche::where('plazas', $request->plazas)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
            if(isset($request->puertas)){
                $puerta = $request->puertas;
                $parametros += ['puertas' => $puerta];
                $coches = Coche::where('puertas', $request->puertas)->orderBy($orderby, $direction)->paginate( $nrp );
            }
            
        }else{
            $coches = Coche::orderBy($orderby, $direction)->paginate( $nrp );
        }
        
        $fotos = $this->getFotos($coches);
        
        $cuenta = $coches->count();
        $users = User::all();
        $provincias = State::where("country_id", 205)->orderby('name')->get(["name", "id"]);
        $años = Make_year::all();
        $marcas = Make::all();
        $modelos = Model_car::all();
        
        $parametros += ['orderby' => $orderby, 'direction' => $direction];
        
        return view('coche.all',$data)->with(['coches' => $coches, 'request' => $request, 'fotos' => $fotos, 'parametros' => $parametros, 'users' => $users, 'provincias' => $provincias, 'años' => $años, 'marcas' => $marcas, 'modelos' => $modelos, 'cuenta' => $cuenta, 'manos' => $manos, 'combustibles' => $combustibles, 'puertas' => $puertas, 'cambios' => $cambios, 'plazas' => $plazas]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myCars(Request $request)
    {
        $user = Auth::user();
        
        if ($user != null){
            
            $verified = $user->hasVerifiedEmail();
            
            if( $verified != null ){
                
                $nrp = 6;
                
                $orderby = 'id';
                
                $id = auth()->user()->id;
                if(isset($request->causa)){
                    if($request->causa == 'activo'){
                        $coches = Coche::where('iduser', $id)->where('causa', '=', 'nulo')->orderBy($orderby, 'desc')->paginate( $nrp );
                    }else{
                        $coches = Coche::where('iduser', $id)->where('causa', '!=', 'nulo')->orderBy($orderby, 'desc')->paginate( $nrp );
                    }
                }else{
                    $coches = Coche::where('iduser', $id)->orderBy($orderby, 'desc')->paginate( $nrp );
                }
                
                //dd($coches);
                
                //$coches = $coches->orderBy( 'id', 'desc' )->paginate( $nrp ); //->appends(['orderby' => $orderby]);    
                
                return view('coche.index')->with(['coches' => $coches, 'parametros' => ['orderby' => $orderby]]);
            }
            return redirect('home')->with('status', 'Por favor, verifique su cuenta para vender un coche.'); 
        }
        return redirect('login')->with('status', 'Por favor, inicie sesión para ver sus coches.'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nrp = 9;
                
        $orderby = 'id';
        
        if(isset($request->mano)){
            $coches = Coche::where('mano', '!=', 'Primera')->orderBy($orderby, 'desc')->paginate( $nrp );
            
        } else if(isset($request->destacado)){
            $coches = Coche::where('destacado', '=', 1)->paginate( $nrp );

        } else if(isset($request->verificado)){
            $coches = Coche::where('verificado', '=', 1)->paginate( $nrp );
            
        }else{
            $coches = Coche::orderBy($orderby, 'desc')->paginate( $nrp );
        }
        
        $fotos = $this->getFotos($coches);
        
        $users = User::all();
        $provincias = State::all();
        $años = Make_year::all();
        $marcas = Make::all();
        $modelos = Model_car::all();
        
        return view('index')->with(['coches' => $coches, 'fotos' => $fotos, 'parametros' => ['orderby' => $orderby], 'users' => $users, 'provincias' => $provincias, 'años' => $años, 'marcas' => $marcas, 'modelos' => $modelos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        
        if ($user != null){
            
            $verified = $user->hasVerifiedEmail();
        
            if( $verified != null ){
                
                $manos = ['Primera' => 'Primera', 'Segunda' => 'Segunda', 'Tercera o más' => 'Tercera o más'];
                $combustibles = ['gasolina' => 'Gasolina', 'diesel' => 'Diesel', 'electrico' => 'Eléctrico', 'hibrido' => 'Híbrido', 'hibridoEnchufable' => 'Híbrido Enchufable', 'gasLicuado' => 'Gas Liquado', 'gasNatural' => 'Gas Natural', 'otro' => 'Otro'];
                $puertas = ['2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'];
                $cambios = ['automatico' => 'Automático', 'manual' => 'Manual'];
                $plazas = ['2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7+' => '7+'];
                
                
                $dataComunidades['states'] = State::where("country_id", 205)->orderby('name')->get(["name", "id"]);
                $data['vehicle_types'] = Vehicle_type::get(["name","id"]);
                
                return view('coche.create', $data, $dataComunidades)->with(['user' => auth()->user(), 'manos' => $manos, 'combustibles' => $combustibles, 'puertas' => $puertas, 'cambios' => $cambios, 'plazas' => $plazas]);
            }
            return redirect('home')->with('status', 'Por favor, verifique su cuenta para vender un coche.'); 
        }
        return redirect('login')->with('status', 'Por favor, inicie sesión para vender un coche.'); 
    }

    public function fetchMake(Request $request)
    {
        $data['makes'] = Make::where("vehicletype_id",$request->vehicletype_id)->orderby('name')->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchMakeYear(Request $request)
    {
        $data['make_years'] = Make_year::where("make_id",$request->make_id)->orderby('year')->get(["year", "id"]);
        return response()->json($data);
    }

    public function fetchModelCar(Request $request)
    {
        $data['model_cars'] = Model_car::where("makeyear_id",$request->makeyear_id)->orderby('name')->get(["name", "id"]);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CocheCreateRequest $request)
    {
        $coche = new Coche($request->all());
        $coche->iduser = auth()->user()->id;
        $archivo = null;
        
        if($request->hasFile('foto')){
            if($request->file('foto')->isValid()) {
                $archivo = $request->file('foto');
                $path = $archivo->getRealPath();
                $imagen = $this->reduceImage($path);
                $coche->foto = base64_encode($imagen);  
            } 
        }
        try {
            $result = $coche->save();
            if($archivo != null){
                $fecha = new \DateTime();
                $nombre = $fecha->getTimestamp() . '.' . $archivo->extension(); //nombre con el que se guarda el archivo en el storage
                $archivo->storeAs('public/images/'. $coche->iduser . '/' . $coche->id, $nombre);
            }
        } catch(\Exception $e) {
            return redirect('coche/index')->withInput()->withErrors(['error' => 'Se ha producido un error al guardar los datos del vehiculo.']);
        }
        return redirect('coche/index')->with(['store' => 'Se ha publicado su vehiculo correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function show(Coche $coche)
    {
        $user = User::find($coche->iduser);
        $provincia = State::find($coche->provincia_id);
        $año = Make_year::find($coche->anio_id);
        $marca = Make::find($coche->marca_id);
        $modelo = Model_car::find($coche->modelo_id);
        
        return view('coche.show')->with(['coche' => $coche, 'user' => $user, 'provincia' => $provincia, 'año' => $año, 'marca' => $marca, 'modelo' => $modelo, 'fotos' => $this->getFiles($coche)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function edit(Coche $coche)
    {
        if(auth()->user()->rol != 'user' || $coche->iduser == auth()->user()->id){
            
            $manos = ['Primera' => 'Primera', 'Segunda' => 'Segunda', 'Tercera o más' => 'Tercera o más'];
            $combustibles = ['gasolina' => 'Gasolina', 'diesel' => 'Diesel', 'electrico' => 'Eléctrico', 'hibrido' => 'Híbrido', 'hibridoEnchufable' => 'Híbrido Enchufable', 'gasLicuado' => 'Gas Liquado', 'gasNatural' => 'Gas Natural', 'otro' => 'Otro'];
            $puertas = ['2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'];
            $cambios = ['automatico' => 'Automático', 'manual' => 'Manual'];
            $plazas = ['2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7+' => '7+'];
            $causas = ['vendido' => 'Vendido', 'retirado' => 'Retirar', 'otro' => 'Otro'];
            
            $dataComunidades['states'] = State::where("country_id", 205)->orderby('name')->get(["name", "id"]);
            $data['vehicle_types'] = Vehicle_type::get(["name","id"]);
            $dataMarcas = Make::where("vehicletype_id",$coche->tipo_id)->orderby('name')->get(["name", "id"]);
            $dataAños = Make_year::where("make_id",$coche->marca_id)->orderby('year')->get(["year", "id"]);
            $dataModelos = Model_car::where("makeyear_id",$coche->anio_id)->orderby('name')->get(["name", "id"]);
            
            return view('coche.edit', $data, $dataComunidades)->with(['coche' => $coche, 'fotos' => $this->getFiles($coche), 'user' => auth()->user(), 'manos' => $manos, 'combustibles' => $combustibles, 'puertas' => $puertas, 'cambios' => $cambios, 'plazas' => $plazas, 'dataMarcas' => $dataMarcas, 'dataAños' => $dataAños, 'dataModelos' => $dataModelos, 'causas' => $causas]);
        } else {
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function update(CocheEditRequest $request, Coche $coche)
    {

        if($coche->iduser == auth()->user()->id){
            
            /*dd($request);
            if($request->activar){
                dd($request);
                $coche->save();
            }
            if($request->desactivar){
                dd($request);
                $coche->causa = 1;
                $coche->save();
            }*/
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
            if(isset($request->causa)){
                $coche->causa = $request->causa;
            }
            try {
                $coche->save();
            } catch(\Exception $e) {
                return back()->withInput()->withErrors(['error' => 'Se ha producido un error al guardar los datos.']);
                dd($e);
            }
            return redirect('coche/' . $coche->id . '/edit')->with(['update' => 'Se han actualizado los datos del vehiculo con exito']);
        }
        return redirect('home')->with(['error' => 'No puede editar un vehiculo que no sea suyo']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coche $coche)
    {
        //
    }
    
    
    public function sendEmail (Coche $coche, Request $request) {
        $request->validate([
            'email' => 'required|email',
            'titulo' => 'required',
            'yourEmail' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'name'  => 'required',
            'content' => 'required',
        ]);
        
        $data = [
            'email' => $request->email,
            'titulo' => $request->titulo,
            'yourEmail' => $request->yourEmail,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'name'  => $request->name,
            'content' => $request->content,
        ];
        
        $mensaje = new Mensaje();
        
        $mensaje->iduser = $request->iduser;
        $mensaje->idcoche = $request->idcoche;
        $mensaje->nombre = $request->name;
        $mensaje->email = $request->yourEmail;
        $mensaje->telefono = $request->phone;
        $mensaje->mensaje = $request->content;

        $mensaje->save();
        
        Mail::send('email-template', $data, function($message) use ($data) {
           $message->to($data['email'])
           ->subject($data['subject']);
        });
        
        return back()->with(['status' => '¡Email enviado con éxito!']);
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
