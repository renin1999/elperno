<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Tipo;
use App\Models\User;
use App\Http\Requests\UpdateVentaRequest;
use App\Http\Requests\SaveVentaRequest;
use App\Models\Venta;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venta = Venta::with('Articulo','User')->get();
       
        return response()->json($venta);
;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveVentaRequest $request)
    {
        $request->validated();
        $venta = new Venta();
        $venta->codventa = strtoupper($request->input('codventa'));
        $venta->cantidad = $request->input('cantidad');
        $venta->valor = $request->input('valor');
        $venta->totalventa =  $request->input('cantidad')*$request->input('valor');
        $venta->id_articulo = $request->input('id_articulo');
        $venta->id_users = $request->input('id_users');
        $data =[
            'status'=>'OK',
            'message'=>'Error al guardar los datos'
        ];

        $articulo= new Articulo();
        $articulo = Articulo::find($venta->id_articulo);
        if($articulo->stock>=$venta->cantidad){
            $articulocontroller = new ArticuloController();
            $articulocontroller->venta($venta,$articulo);
            if ($venta->save()) {
                $data['message'] = "Registro guardado correctamente";
                $data['venta'] = $venta;
                return response()->json($data, 200);
            }
        }else{
            $data['message'] = "Cantidad no disponible en stock";
        }
       
        return response()->json($data,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
        return response()->json([
            'status'=>'OK',
            'message'=>"Registro encontrado",
            'venta'=>$venta
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVentaRequest $request, Venta $venta)
    {
        //
        $request->validated();
        $ventaant = new Venta();
        $ventaant = Venta::find($venta->id);
        $venta = Venta::find($venta->id);
        $articulo= new Articulo();
        $articulo = Articulo::find($venta->id_articulo);
        $articulocontroller = new ArticuloController();
        

        $ventaant->cantidad = -1*$venta->cantidad; 
        $ventaant->totalventa = -1*$venta->totalventa;

        $articulocontroller->venta($ventaant,$articulo);
        
        $venta->codventa = strtoupper($request->input('codventa'));
        $venta->cantidad = $request->input('cantidad');
        $venta->valor = $request->input('valor');
        $venta->totalventa =  $request->input('cantidad')*$request->input('valor');
        $venta->id_users = $request->input('id_users');
        $venta->id_articulo = $request->input('id_articulo');
        $data =[
            'status'=>'OK',
            'message'=>'Error al cargar los datos'
        ];
        
        if(($articulo->stock)>=$venta->cantidad){
            $articulocontroller->venta($venta,$articulo);
            if ($venta->save()) {
                $data['message'] = "Registro guardado correctamente";
                $data['venta'] = $venta;
                return response()->json($data, 200);
            }
        }else{
            $data['message'] = "Cantidad no disponible en stock";
        }
       
        return response()->json($data,200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
        $venta = Venta::find($venta->id);
        $venta->cantidad = -1*$venta->cantidad; 
        $venta->totalventa = -1*$venta->totalventa;

        $articulo= new Articulo();
        $articulo = Articulo::find($venta->id_articulo);
        $articulocontroller = new ArticuloController();
        $articulocontroller->venta($venta,$articulo);
        
        if ($venta->delete()) {
            return response()->json([
            'status'=>'OK',
            'message'=>"El registro de elimino correctamente",
            'venta' => $venta
        ]);
    }
}
}
