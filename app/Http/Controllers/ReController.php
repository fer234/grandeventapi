<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Re;
use Carbon\Carbon;

class ReController extends Controller{
    public function index(){
        $datosRe = Re::all();
        return response()->json($datosRe);
    }

    public function ver($dui){
        $datosRe=new Re;
        $datosEncontrados=$datosRe->find($dui);
        return response()->json($datosEncontrados);
    }

    public function eliminar($id){
        $datosRe= Re::find($id);
        $datosRe->delete();
        return response("El registro eliminado.");
    }

    public function guardar(Request $request){
        $datosRe=new Re;
        $datosRe->nombre=$request->nombre;
        $datosRe->apellido=$request->apellido;  
        $datosRe->dui=$request->dui;  
        $datosRe->correo=$request->correo;  
        $datosRe->evento=$request->evento;  
        $datosRe->telefono=$request->telefono;  
        $datosRe->fecha=$request->fecha;  
        $datosRe->save();
        return response("El registro guardado.");
    }

    public function actualizar(Request $request, $id){
        // Buscamos informacion del libro solicitado
        $datosRe = Re::find($id);
        // verificamos la informacion del libro
        $datosRe->nombre=$request->input('nombre');
        $datosRe->apellido=$request->input('apellido');
        $datosRe->dui=$request->input('dui');
        $datosRe->correo=$request->input('correo');
        $datosRe->evento=$request->input('evento');
        $datosRe->telefono=$request->input('telefono');
        $datosRe->fecha=$request->input('fecha');
        $datosRe->save();
        return response()->json('Registro actualizado');
    }

}