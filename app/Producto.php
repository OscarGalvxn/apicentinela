<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class Producto extends Model
{
protected $table = 'productos';
protected $primarykey = 'idProducto';

public function listarTelefonia(){
    $productos =DB::select('Select * from productosTelefonia');
   
  return response()->json(array(
   'productos' =>$productos,
    'status' =>'success'
  ));
  
  }
  public function listarComputacion(){
    $productos =DB::select('Select * from productosComputacion');
   
    return response()->json(array(
      'productos' =>$productos,
       'status' =>'success'
     ));
  
  }
  public function listarRedes(){
    $productos =DB::select('Select * from productosRedes');
   
    return response()->json(array(
      'productos' =>$productos,
       'status' =>'success'
     ));  
  }

}
