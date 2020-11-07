<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Compra;
use App\Helpers\JwtAuth;


class ComprasController extends Controller
{

  
    public function nuevaCompra(Request $request){
        $json = $request->input('json');
        $params = json_decode($json);
      
       $compra = new Compra();
 
       var_dump($params);
        
        /* Procedmiento Almacenado*/
          DB::select(' Select altaCompras(?,?,?,?,?) ', array(
         
            $compra->montocompra =  (!is_null($json) && isset($params->montocompra)) ? $params->montocompra  : null,
            $compra->fechacompra = (!is_null($json) && isset($params->fechacompra)) ? $params->fechacompra : null,
            $compra->idcliente = (!is_null($json) && isset($params->idcliente)) ? $params->idcliente : null,
            $compra->idproducto = (!is_null($json) && isset($params->idproducto)) ? $params->idproducto : null,
            $compra->cantidadarticulos = (!is_null($json) && isset($params->cantidadarticulos)) ? $params->cantidadarticulos : null
     
      
      
      )); 
 echo 'Compra realizada';






    }
}
