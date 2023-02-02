<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ArticuloController;
use App\Http\Requests\SaveCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Models\Compra;
use App\Models\Articulo;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compra = Compra::with('Proveedor','Articulo')->get();
       
        return response()->json($compra);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCompraRequest $request)
    {
        $request->validated();
        $compra = new Compra();
        $compra->codcompra = strtoupper($request->input('codcompra'));
        $compra->cantidad = $request->input('cantidad');
        $compra->valor = $request->input('valor');
        $compra->totalcompra =  $request->input('cantidad')*$request->input('valor');
        $compra->id_proveedor = $request->input('id_proveedor');
        $compra->id_articulo = $request->input('id_articulo');
        $data =[
            'status'=>'OK',
            'message'=>'Error al guardar los datos'
        ];

        $articulo= new Articulo();
        $articulo = Articulo::find($compra->id_articulo);
        $articulocontroller = new ArticuloController();
            $articulocontroller->compra($compra,$articulo);
            if ($compra->save()) {
                $data['message'] = "Registro guardado correctamente";
                $data['compra'] = $compra;
                return response()->json($data, 200);
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        return response()->json([
            'status'=>'OK',
            'message'=>"Registro encontrado",
            'compra'=>$compra
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompraRequest $request, Compra $compra)
    {
        $request->validated();
        $compraant = new Compra();
        $compraant = Compra::find($compra->id);
        $compra = Compra::find($compra->id);
        $articulo= new Articulo();
        $articulo = Articulo::find($compra->id_articulo);
        $articulocontroller = new ArticuloController();
        

        $compraant->cantidad = -1*$compra->cantidad; 
        $compraant->totalcompra = -1*$compra->totalcompra;

        $articulocontroller->compra($compraant,$articulo);
        
        $compra->codcompra = strtoupper($request->input('codcompra'));
        $compra->cantidad = $request->input('cantidad');
        $ant = $compraant ->cantidad;
        $compra->valor = $request->input('valor');
        $compra->totalcompra =  $request->input('cantidad')*$request->input('valor');
        $compra->id_proveedor = $request->input('id_proveedor');
        $compra->id_articulo = $request->input('id_articulo');
        $data =[
            'status'=>'OK',
            'message'=>'Error al cargar los datos'
        ];
        
        $articulocontroller->compra($compra,$articulo);
            if ($compra->save()) {
                $data['message'] = "Registro guardado correctamente";
                $data['compra'] = $compra;
                return response()->json($data, 200);}
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra = Compra::find($compra->id);
        $compra->cantidad = -1*$compra->cantidad; 
        $compra->totalcompra = -1*$compra->totalcompra;

        $articulo= new Articulo();
        $articulo = Articulo::find($compra->id_articulo);
        $articulocontroller = new ArticuloController();
        $articulocontroller->compra($compra,$articulo);
        
        if ($compra->delete()) {
            return response()->json([
            'status'=>'OK',
            'message'=>"El registro de elimino correctamente"
        ]);
    }
    }
}
