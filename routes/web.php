<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\EstablecimientoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function(){
    //Establecimiento
    Route::get('/establecimiento/create', [EstablecimientoController::class, 'create'])->name('establecimiento.create');
    Route::post('/establecimiento', [EstablecimientoController::class, 'store'])->name('establecimiento.store');
    Route::get('/establecimiento/edit', [EstablecimientoController::class, 'edit'])->name('establecimiento.edit');

    //Imágenes
    Route::post('/imagenes/store', [ImagenController::class, 'store'])->name('imagen.store');
    Route::post('/imagenes/destroy', [ImagenController::class, 'destroy'])->name('imagen.destroy');

});



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
