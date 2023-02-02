<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

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


Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('login', function () {
    
    $credenciales = request()->validate([
        'username' => ['required','string']
        ,'password' => ['required','string']
    ]);

    if(Auth::attempt($credenciales)){
        request()->session()->regenerate();
        return redirect('home');
    }

    throw ValidationException::withMessages([
        'username' => 'Estas credenciales no coinciden con nuestros registros'
    ]);
});


Route::get('/datosgerente', function () {
    return view('datosgerente');
})->name('datosgerente')->middleware('auth');;

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('')->with('status','Has cerrado sesión');
})->name('logout');

Route::get('/marca', function () {
    return view('marca');
})->name('marca')->middleware('auth');;

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');;

Route::get('/proveedor', function () {
    return view('proveedor');
})->name('proveedor')->middleware('auth');;

Route::get('/tipo', function () {
    return view('tipo');
})->name('tipo')->middleware('auth');;

Route::get('/articulos', function () {
    return view('articulos');
})->name('articulos')->middleware('auth');;

Route::get('/compra', function () {
    return view('compra');
})->name('compra')->middleware('auth');;

Route::get('/venta', function () {
    return view('venta');
})->name('venta')->middleware('auth');;

Route::get('/gerente', function () {
    return view('gerente');
})->name('gerente')->middleware('auth');;

Route::get('/analisis', function () {
    return view('analisis');
})->name('analisis')->middleware('auth');;






