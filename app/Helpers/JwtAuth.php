<?php
namespace App\Helpers;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use App\Cliente;
class JwtAuth{
    public $key;
    public function __construct(){
$this->key ='RubenBebe';
    }

public function signup($email, $password,$getToken=null){
$cliente = Cliente::where(
array(
    'email'=> $email,
    'password' =>$password
))->first();
$signup = false;

if(is_object($cliente)){
    $signup = true;
}
if($signup){
$token = array(
    'email'=> $cliente->email,
    'password' =>$cliente->password,
    'nombre'=>$cliente->nombre,
    'apellidopaterno' =>$cliente->apellidopaterno,
    'apellidomaterno' =>$cliente->apellidomaterno,
    'direccion' =>$cliente->direccion,
    'edad' =>$cliente->edad,
    'genero' =>$cliente->genero,
    'ciudad' =>$cliente->ciudad,
    'idcliente'=>$cliente->idcliente,
    'iat'=>time(),
    'exp'=> time() + (7*24*60*60)

);

$jwt = JWT::encode($token,$this->key, 'HS256');
$decoded = JWT::decode($jwt,$this->key,array('HS256'));

if(is_null($getToken)){
    return $jwt;
}else{
    return $decoded;
}

}else{
    return array('status'=>'error','message'=>'Login fallado');
}}
public  function checkToken($jwt,$getIdentity = false)
{
    $auth = false;
try{
    $decoded = JWT::decode($jwt, $this->key, 'HS256');

} catch(\UnexpectedValueException $e){
$auth = false; 
}catch(\DomainException $e){
$auth = false;
}
if(is_object($decoded) && isset($decoded->sub)){
     $auth = true;
}else{
    $auth = false;
}
if($getIdentity){
    return $decoded;

}


    return $auth;
}


}