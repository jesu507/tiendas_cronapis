<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TiendaFormRequest;
use App\Models\Tienda as Modelo;
use App\Http\Resources\Tienda as TiendaResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class TiendaController extends Controller
{
    public function index(Request $request)
    {   
        if ($request) {
        $query = trim($request->get('search'));
        $tienda = DB::table('tiendas')->where('nombre', 'LIKE', '%'.$query.'%')        
        ->paginate(7); 

      
        return response()->json(["tienda"=>$tienda,"search"=>$query]);
        }
    }



    public function show($id)
    {
        $tienda = Modelo::find($id);
        return response()->json($tienda, 200);
    }

    public function store(TiendaFormRequest $request)
    {
     $validata = Validator::make($request->all(), [
        'nombre' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'email' => 'required',
        'longitud' => 'required',
        'latitud' => 'required', 
     ]);

     if ($validata->fails()) {
         return response()->json(['error' => 'los datos fallaron', "error_list" => $validata->errors()], 400);
     }

     $tienda = Modelo::create($request->all());
     return response()->json(new TiendaResource($tienda), 201);
    }

    public function image(Modelo $tienda)
    {
     return response()->download(Storage::Url($tienda->image));
    }    

    public function update(TiendaFormRequest $request, $id)
    {
        $tienda = Modelo::findOrFail($id);
        $tienda->update($request->all());
        return response()->json($tienda, 201);
    }

     public function delete($id)
    {
        $tienda = Modelo::find($id);
        $tienda->delete();
        return response()->json( 204);
    }

    public function getMapa($id)
  {
        $tienda =$this->tiendas->findById($id); // User::find($id)  yo estaba ocupando inyeccion de dependencias
        return View::make('muestramapa')->with('usuarios',$usuarios);
  }
}
