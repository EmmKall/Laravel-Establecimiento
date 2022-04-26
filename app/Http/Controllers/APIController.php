<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Establecimiento;

class APIController extends Controller
{
    //Obtener todas las Categorias
    public function categorias(){
        $categorias = Categoria::all();
        return response()->json( $categorias );
    }

    public function categoria( Categoria $categoria){
        $establecimientos = Establecimiento::where( 'categoria_id', $categoria->id)->with('categoria')->get();
        return response()->json( $establecimientos );
    }
}
