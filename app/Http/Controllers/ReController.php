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

    public function ver($id){
        $datosRe=new Re;
        $datosEncontrados=$datosRe->find($id);
        return response()->json($datosEncontrados);
    }

}