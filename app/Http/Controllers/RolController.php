<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rol = Rol::all();
        return response()->json([
            'status'=>'OK',
            'articulos'=> $rol
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolRequest $request)
    {
        $request->validated();
        $rol = new Rol();
        $rol->rol = e($request->input('rol'));
        if ($rol->save()) {
            return response()->json([
                'status' => 'OK',
                'message' =>'Registro guardado correctamente',
                'roles' => $rol
            ],201);
        }
        return response()->json(['message' => 'Error al guardar el registro'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        //
        return response()->json([
            'status' =>'OK',
            'rol'=> $rol
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolRequest $request, Rol $rol)
    {
        //
        $request->validated();
        $rol = Rol::find($rol->id);;
        $rol->rol = strtoupper(e($request->input('rol')));
        if ($rol->save()) {
            return response()->json([
                'status' => 'OK',
                'message' =>'Registro actualizado correctamente',
                'roles' => $rol
            ],201);
        }
        return response()->json(['message' => 'Error al guardar el registro'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        //
        $rol->delete();
        return response()->json(
            [
               'status'=>"OK",
               'rol'=>$rol,
               'message'=>"Registro se elimino correctamente"
            ],200);
    }
}
