<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Usuario;
use App\Helpers\JwtAuth;

class UsuariosController extends Controller
{


  public function index(){
    echo "Hola";
  }
   public function registro(Request $request){
      
        $json = $request->input('json');
        $params = json_decode($json);
    
       $usuario = new Usuario();
    $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
       $pwd = hash('sha256', $password);

        
        /* Procedmiento Almacenado*/
         try{
          DB::select(' Select registroUsuario(?,?,?,?,?) ', array(
            $usuario->nombreUsuario =  (!is_null($json) && isset($params->nombreUsuario)) ? $params->nombreUsuario  : null,
           
            $usuario->email = (!is_null($json) && isset($params->email)) ? $params->email : null,
            $pwd,
            $usuario->edad = (!is_null($json) && isset($params->edad)) ? $params->edad : null,
            $usuario->genero = (!is_null($json) && isset($params->genero)) ? $params->genero : null )); 
            echo 'Usuario creado';

    }catch(Exception $e){
      echo $e->getMessage();
   } 

      

    }     
    public  function login(Request $request)
    {
     $jwtAuth = new JwtAuth();
     $json = $request->input('json', null);
     $params = json_decode($json);

     $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
     $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
     $getToken = (!is_null($json) && isset($params->gettoken) ) ? $params->gettoken : null;

        $pwd = hash('sha256', $password);
if(!is_null($email) && !is_null($password) && ($getToken == null || $getToken == 'false' )){
  $signup = $jwtAuth->signup($email, $pwd);


}elseif($getToken != null){
  //var_dump($getToken); die();
  $signup = $jwtAuth->signup($email, $pwd,$getToken);
}
else{
  $signup = array(
    'status'=> 'error',
    'message'=> 'Envia tus datos por post'
    
    );
}


return response()->json($signup,200);
 
    }
    
    public function actualizar(Request $request){
      
      $json = $request->input('json');
      $params = json_decode($json);
  
     $cliente = new Cliente();
  $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
     $pwd = hash('sha256', $password);

      
      /* Procedmiento Almacenado*/
        DB::select(' Select actualizaCliente(?,?,?,?,?,?,?,?,?,?,?) ', array(
          $idcliente = (!is_null($json) && isset($params->idcliente)) ? $params->idcliente : null,
          $cliente->nombre =  (!is_null($json) && isset($params->nombre)) ? $params->nombre  : null,
          $cliente->apellidopaterno = (!is_null($json) && isset($params->apellidopaterno)) ? $params->apellidopaterno : null,
          $cliente->apellidomaterno = (!is_null($json) && isset($params->apellidomaterno)) ? $params->apellidomaterno : null,
          $cliente->direccion = (!is_null($json) && isset($params->direccion)) ? $params->direccion : null,
          $cliente->telefono = (!is_null($json) && isset($params->telefono)) ? $params->telefono : null,
          $cliente->email = (!is_null($json) && isset($params->email)) ? $params->email : null,
          $pwd,
          $cliente->edad = (!is_null($json) && isset($params->edad)) ? $params->edad : null,
          $cliente->genero = (!is_null($json) && isset($params->genero)) ? $params->genero : null,
          $cliente->ciudad = (!is_null($json) && isset($params->ciudad)) ? $params->ciudad : null,

    
    
    )); 

echo 'Usuario creado';


    

  }     

          
      }


    

   



