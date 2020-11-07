<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Reparacion;
use Illuminate\Support\Facades\DB;

class ReparacionController extends Controller
{
    public function nuevaReparacion(Request $request){

        $json = $request->Input('json');
        $parametros = json_decode($json);

        $reparacion = new Reparacion();
        var_dump($json);

        var_dump($parametros);

        DB::select('SELECT altaReparacion(?,?,?,?,?,?)', array(
            $reparacion = (!is_null($json) && isset($parametros->montoreparacion) ? $parametros->montoreparacion : null),
            $reparacion = (!is_null($json) && isset($parametros->fechagenerada) ? $parametros->fechagenerada : null),
            $reparacion = (!is_null($json) && isset($parametros->idcliente) ? $parametros->idcliente : null),
            $reparacion = (!is_null($json) && isset($parametros->descripcionreparacion) ? $parametros->descripcionreparacion : null),
            $reparacion = (!is_null($json) && isset($parametros->categoriareparacion) ? $parametros->categoriareparacion : null),
            $reparacion = (!is_null($json) && isset($parametros->estatus) ? $parametros->estatus : null)




        ));

        echo 'orden de reparacion registrada';



    }
}
