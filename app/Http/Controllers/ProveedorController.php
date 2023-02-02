<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Http\Requests\UpdateProveedorRequest;
use App\Http\Requests\SaveProveedorRequest;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor = Proveedor::All();
        return response($proveedor);//
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProveedorRequest $request)
    {
        $request->validated();
        $proveedor = new Proveedor();
        $proveedor->codproveedor = strtoupper(e($request->input('codproveedor')));//
        $proveedor->nombre_ape = strtoupper(e($request->input('nombre_ape')));
        $proveedor->direccion = strtoupper(e($request->input('direccion')));
        $proveedor->email = $request->input('email');
        $proveedor->telefono = $request->input('telefono');
        if($proveedor->save()){
            return response()->json([
               'status' => 'OK',
                'proveedor' => $proveedor,
                'message'=>'Guardado'
           ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        return response()->json([
            'status' => 'OK',
            'proveedor' => $proveedor
        ],200); //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProveedorRequest $request, Proveedor $proveedor)
    {
        //
        $request->validated();
        $proveedor = Proveedor::find($proveedor->id);;
        $proveedor->codproveedor = strtoupper(e($request->input('codproveedor')));//
        $proveedor->nombre_ape = strtoupper(e($request->input('nombre_ape')));
        $proveedor->direccion = strtoupper(e($request->input('direccion')));
        $proveedor->email = $request->input('email');
        $proveedor->telefono = $request->input('telefono');
        if ($proveedor->save()) {
            return response()->json([
                'status' => 'OK',
                'message' =>'Registro actualizado correctamente',
                'proveedor' => $proveedor
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
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return response()->json([
            'status' => "OK",
            'message' => "Eliminado"
        ]);//
    }
}
