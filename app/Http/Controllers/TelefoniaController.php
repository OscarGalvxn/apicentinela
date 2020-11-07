<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Http\Requests;

class TelefoniaController extends Controller
{
    public function mostrar(){


        var_dump(  DB::select('SELECT * FROM telefonia limit 1'));

    }
}
