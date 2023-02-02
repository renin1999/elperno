<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SavePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $persona = Persona::all();
        return response($persona);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePersonaRequest $request)
    {

        $request->validated();
        $persona = new Persona();
        $persona->cedula = $request->input('cedula');
        $persona->nombre = strtoupper(e($request->input('nombre')));
        $persona->apellido = strtoupper(e($request->input('apellido')));
        $persona->edad = $request->input('edad');
        $persona->sexo = strtoupper(e($request->input('sexo')));
        $persona->email = $request->input('email');
        $persona->telefono = $request->input('telefono');
        $resultado = $persona->save();
        if ($resultado) {
            return response($persona);
        }
        return response()->json(['message' => 'Error al guardar el registro'], 500);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return response()->json([
            'status' =>'OK',
            'persona'=> $persona
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonaRequest $request, Persona $persona)
    {
        $request->validated();
        $persona = Persona::find($persona->id);
        $persona->cedula = $request->input('cedula');
        $persona->nombre = strtoupper(e($request->input('nombre')));
        $persona->apellido = strtoupper(e($request->input('apellido')));
        $persona->edad = $request->input('edad');
        $persona->sexo = strtoupper(e($request->input('sexo')));
        $persona->email = $request->input('email');
        $persona->telefono = $request->input('telefono');
        $resultado = $persona->save();
        if ($resultado) {
            return response()->json(
                [
                   'status'=>"OK",
                   'message'=>"Registro se actualizo correctamente",
                   'persona' => $persona
                ],200);
        }
        return response()->json(['message' => 'Error al guardar el registro'], 500);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
        $persona->delete();
        return response()->json(
            [
               'status'=>"OK",
               'message'=>"Registro se elimino correctamente"
            ],200);
    }
}
