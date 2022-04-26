<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //Rutas por slug y no por id
    public function getRouteKeyName(){
        return 'slug';
    }

    //Relación 1:n
    public function establecimientos(){
        return $this->hasMany( Establecimiento::class );
    }

}
