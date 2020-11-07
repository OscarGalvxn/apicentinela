<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Producto;

class ProductosController extends Controller
{

    public function Telefonia(){
        $telefonia = new Producto();
        return $telefonia->listarTelefonia();
       
      }
      public function Computacion(){
        $computacion = new Producto();
        return $computacion->listarComputacion();

      }
      public function Redes(){
        $redes = new Producto();
        return $redes->listarRedes();

      }


}
