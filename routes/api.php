<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\MarcaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::resource('marca', App\Http\Controllers\MarcaController::class)->only(['index','store','update','show','destroy']);


Route::prefix('v1')->group(function(){

    Route::get('/users',[App\Http\Controllers\UserController::class,'users']);
    Route::post('/login',[App\Http\Controllers\UserController::class,'login']);

    Route::get('/marca',[App\Http\Controllers\MarcaController::class,'index'])->name('listMarca');
    Route::post('/marca',[App\Http\Controllers\MarcaController::class,'store'])->name('addMarca');
    Route::get('/marca/{marca}',[App\Http\Controllers\MarcaController::class,'show'])->name('viewMarca');
    Route::put('/marca/{marca}',[App\Http\Controllers\MarcaController::class,'update'])->name('updateMarca');
    Route::delete('/marca/{marca}',[App\Http\Controllers\MarcaController::class,'destroy'])->name('deleteMarca');

    Route::get('/proveedor',[App\Http\Controllers\ProveedorController::class,'index'])->name('listProveedor');
    Route::post('/proveedor',[App\Http\Controllers\ProveedorController::class,'store'])->name('addProveedor');
    Route::get('/proveedor/{proveedor}',[App\Http\Controllers\ProveedorController::class,'show'])->name('viewProveedor');
    Route::put('/proveedor/{proveedor}',[App\Http\Controllers\ProveedorController::class,'update'])->name('updateProveedor');
    Route::delete('/proveedor/{proveedor}',[App\Http\Controllers\ProveedorController::class,'destroy'])->name('deleteProveedor');

    Route::get('/tipo',[App\Http\Controllers\TipoController::class,'index'])->name('listTipo');
    Route::post('/tipo',[App\Http\Controllers\TipoController::class,'store'])->name('addTipo');
    Route::get('/tipo/{tipo}',[App\Http\Controllers\TipoController::class,'show'])->name('viewTipo');
    Route::put('/tipo/{tipo}',[App\Http\Controllers\TipoController::class,'update'])->name('updateTipo');
    Route::delete('/tipo/{tipo}',[App\Http\Controllers\TipoController::class,'destroy'])->name('deleteTipo');

    Route::get('/articulo',[App\Http\Controllers\ArticuloController::class,'index'])->name('listArticulo');
    Route::post('/articulo',[App\Http\Controllers\ArticuloController::class,'store'])->name('addArticulo');
    Route::get('/articulo/{articulo}',[App\Http\Controllers\ArticuloController::class,'show'])->name('viewArticulo');
    Route::put('/articulo/{articulo}',[App\Http\Controllers\ArticuloController::class,'update'])->name('updateArticulo');
    Route::delete('/articulo/{articulo}',[App\Http\Controllers\ArticuloController::class,'destroy'])->name('deleteArticulo');

    Route::get('/compra',[App\Http\Controllers\CompraController::class,'index'])->name('listCompra');
    Route::post('/compra',[App\Http\Controllers\CompraController::class,'store'])->name('addCompra');
    Route::get('/compra/{compra}',[App\Http\Controllers\CompraController::class,'show'])->name('viewCompra');
    Route::put('/compra/{compra}',[App\Http\Controllers\CompraController::class,'update'])->name('updateCompra');
    Route::delete('/compra/{compra}',[App\Http\Controllers\CompraController::class,'destroy'])->name('deleteCompra');

    Route::get('/persona',[App\Http\Controllers\PersonaController::class,'index'])->name('listPersona');
    Route::post('/persona',[App\Http\Controllers\PersonaController::class,'store'])->name('addPersona');
    Route::get('/persona/{persona}',[App\Http\Controllers\PersonaController::class,'show'])->name('viewPersona');
    Route::put('/persona/{persona}',[App\Http\Controllers\PersonaController::class,'update'])->name('updatePersona');
    Route::delete('/persona/{persona}',[App\Http\Controllers\PersonaController::class,'destroy'])->name('deletePersona');

    Route::get('/rol',[App\Http\Controllers\RolController::class,'index'])->name('listRol');
    Route::post('/rol',[App\Http\Controllers\RolController::class,'store'])->name('addRol');
    Route::get('/rol/{rol}',[App\Http\Controllers\RolController::class,'show'])->name('viewRol');
    Route::put('/rol/{rol}',[App\Http\Controllers\RolController::class,'update'])->name('updateRol');
    Route::delete('/rol/{rol}',[App\Http\Controllers\RolController::class,'destroy'])->name('deleteRol');

    Route::post('/user',[App\Http\Controllers\UserController::class,'store'])->name('addUser');
    Route::get('/user/{user}',[App\Http\Controllers\UserController::class,'show'])->name('viewUser');
    Route::put('/user/{user}',[App\Http\Controllers\UserController::class,'update'])->name('updateUser');
    Route::delete('/user/{user}',[App\Http\Controllers\UserController::class,'destroy'])->name('deleteUser');

    Route::get('/venta',[App\Http\Controllers\VentaController::class,'index'])->name('listVenta');
    Route::post('/venta',[App\Http\Controllers\VentaController::class,'store'])->name('addVenta');
    Route::get('/venta/{venta}',[App\Http\Controllers\VentaController::class,'show'])->name('viewVenta');
    Route::put('/venta/{venta}',[App\Http\Controllers\VentaController::class,'update'])->name('updateVenta');
    Route::delete('/venta/{venta}',[App\Http\Controllers\VentaController::class,'destroy'])->name('deleteVenta');

    Route::get('/ventaxmarca',[App\Http\Controllers\AnalisisController::class,'ventaxmarca'])->name('ventaxmarca');
    Route::get('/top5marcasventa',[App\Http\Controllers\AnalisisController::class,'top5marcasvendidas'])->name('top5marcasventa');
    Route::get('/top3tiposproductosmenosventas',[App\Http\Controllers\AnalisisController::class,'top3tiposproductosmenosventas'])->name('top3tiposproductosmenosventas');
    Route::get('/top5tiposproductosvendidos',[App\Http\Controllers\AnalisisController::class,'top5tiposproductosvendidos'])->name('top5tiposproductosvendidos');
    Route::get('/top5productosvendidos',[App\Http\Controllers\AnalisisController::class,'top5productosvendidos'])->name('top5productosvendidos');
    Route::get('/productosmasvendidosxcantidad',[App\Http\Controllers\AnalisisController::class,'productosmasvendidosxcantidad'])->name('productosmasvendidosxcantidad');
    Route::get('/productosmayorprecio',[App\Http\Controllers\AnalisisController::class,'productosmayorprecio'])->name('productosmayorprecio');
    Route::get('/cantidadproductosxtipovendidos',[App\Http\Controllers\AnalisisController::class,'cantidadproductosxtipovendidos'])->name('cantidadproductosxtipovendidos');
    Route::get('/cantidadproductosvendidos',[App\Http\Controllers\AnalisisController::class,'cantidadproductosvendidos'])->name('cantidadproductosvendidos');
    Route::get('/totalventas',[App\Http\Controllers\AnalisisController::class,'totalventas'])->name('totalventas');
    Route::get('/productosmayoralpromedioventas',[App\Http\Controllers\AnalisisController::class,'productosmayoralpromedioventas'])->name('productosmayoralpromedioventas');
    Route::get('/productosmenoralpromedioventas',[App\Http\Controllers\AnalisisController::class,'productosmenoralpromedioventas'])->name('productosmenoralpromedioventas');
    Route::get('/totalcompras',[App\Http\Controllers\AnalisisController::class,'totalcompras'])->name('totalcompras');
    Route::get('/sumacantidad',[App\Http\Controllers\AnalisisController::class,'sumacantidad'])->name('sumacantidad');
    Route::get('/sumastock',[App\Http\Controllers\AnalisisController::class,'sumastock'])->name('sumastock');
    Route::get('/sumacantidadcomprados',[App\Http\Controllers\AnalisisController::class,'sumacantidadcomprados'])->name('sumacantidadcomprados');
    Route::get('/ventaxultimoano',[App\Http\Controllers\AnalisisController::class,'ventaxultimoano'])->name('ventaxultimoano');
    Route::get('/ventaactualmes',[App\Http\Controllers\AnalisisController::class,'ventaactualmes'])->name('ventaactualmes');
    Route::get('/ventaxtipo',[App\Http\Controllers\AnalisisController::class,'ventaxtipo'])->name('ventaxtipo');
    Route::get('/articulosnovendidos',[App\Http\Controllers\AnalisisController::class,'articulosnovendidos'])->name('articulosnovendidos');
    Route::get('/productosmenorprecio',[App\Http\Controllers\AnalisisController::class,'productosmenorprecio'])->name('productosmenorprecio');
    Route::get('/articulosmenorigual',[App\Http\Controllers\AnalisisController::class,'articulosmenorigual'])->name('articulosmenorigual');
    Route::get('/cantidadexistenxmarca',[App\Http\Controllers\AnalisisController::class,'cantidadexistenxmarca'])->name('cantidadexistenxmarca');
    Route::get('/t10ultimos',[App\Http\Controllers\AnalisisController::class,'t10ultimos'])->name('t10ultimos');



});

