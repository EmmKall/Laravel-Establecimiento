<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //

    public function store(Request $request){

        //Leer imagen
        $ruta_imagen = $request->file('file')->store('establecimientos', 'public' );

        //Resize
        $imagen = Image::make( public_path("storage/{$ruta_imagen}") )->fit(800, 450);
        $imagen->save();

        //Almacenar
        $imagenDB = new Imagen;
        $imagenDB->id_establecimiento = $request['uuid'];
        $imagenDB->ruta_imagen = $ruta_imagen;
        $imagenDB->save();

        //Retornar respuesta
        $respuesta = [
            'archivo' => $ruta_imagen,
        ];

        return response()->json( $respuesta );

        //return $request->file('file');//Ruta del archivo
        //return $request->all();
    }

    public function destroy( Request $request ){

        $imagen = $request->get('imagen');

        if( File::exists( 'storage/' . $imagen ) ){
            File::delete( 'storage/' . $imagen );
        }

        //$imagenEliminar = Imagen::where( 'ruta_imagen', '=', $imagen )->firstOrFail();
        //Imagen::destroy( $imagenEliminar->id );
        Imagen::where( 'ruta_imagen' , '=', $imagen )->delete();

        $respuesta = [
            'imagen' => $imagen,
            'estatus' => 'eliminada',
        ];

        return response()->json( $respuesta );
    }

}
