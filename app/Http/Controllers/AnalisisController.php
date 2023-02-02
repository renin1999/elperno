<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Venta;
use DB;
use Carbon\Carbon;


class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ventaxmarca()
    {
        $ventaxmarca = DB::table('ventas')
        ->join('articulos','ventas.id_articulo','=','articulos.id')
        ->join('marcas','articulos.id_marca','=','marcas.id')
        ->select('marcas.detalle', DB::raw('SUM(ventas.totalventa) as total_ventas'))->distinct()
        ->groupBy('marcas.detalle')
        ->get();
         
        return response()->json($ventaxmarca);
    }
    public function top5marcasvendidas(){
        $t5marcavendida = DB::table('ventas')
        ->join('articulos','ventas.id_articulo','=','articulos.id')
        ->join('marcas','articulos.id_marca','=','marcas.id')
        ->select('marcas.detalle', DB::raw('SUM(ventas.totalventa) as total_ventas'))
        ->groupBy('marcas.detalle')
        ->orderByDesc('ventas.totalventa')
        ->limit(5)
        ->get();
        return response()->json($t5marcavendida);
    }
    public function top3tiposproductosmenosventas(){
        $top3tiposproductosmenosventas = DB::table('ventas')
        ->join('articulos','ventas.id_articulo','=','articulos.id')
        ->join('tipos','articulos.id_tipo','=','tipos.id')
        ->select('tipos.detalle', DB::raw('SUM(ventas.totalventa) as total_ventas'))
        ->groupBy('tipos.detalle','ventas.totalventa')
        ->orderByRaw('SUM(ventas.totalventa) ASC')
        ->limit(3)
        ->get();
        return response()->json($top3tiposproductosmenosventas);
    }
    public function top5tiposproductosvendidos(){
        $top5tiposproductosvendidos = DB::table('ventas')
        ->join('articulos','ventas.id_articulo','=','articulos.id')
        ->join('tipos','articulos.id_tipo','=','tipos.id')
        ->select('tipos.detalle', DB::raw('SUM(ventas.totalventa) as total_ventas'))
        ->groupBy('tipos.detalle','ventas.totalventa')
        ->orderByRaw('SUM(ventas.totalventa) Desc')
        ->limit(5)
        ->get();
        return response()->json($top5tiposproductosvendidos);
    }
    public function top5productosvendidos(){
        $top5productosvendidos = DB::table('ventas')
        ->join('articulos','ventas.id_articulo','=','articulos.id')
        ->join('tipos','articulos.id_tipo','=','tipos.id')
        ->select('articulos.detalle', DB::raw('SUM(ventas.totalventa) as total_ventas'))
        ->groupBy('articulos.detalle','ventas.totalventa')
        ->orderByRaw('SUM(ventas.totalventa) Desc')
        ->limit(5)
        ->get();
        return response()->json($top5productosvendidos);
    }
    public function productosmasvendidosxcantidad(){
        $productosmasvendidosxcantidad = DB::table('articulos')
        ->join('ventas','articulos.id','=','ventas.id_articulo')
        ->select('articulos.detalle', DB::raw('SUM(ventas.cantidad) as cantidad_ventas'),DB::raw('SUM(ventas.totalventa) as total_ventas'))
        ->groupBy('articulos.detalle')
        ->orderByDesc('ventas.cantidad')
        ->limit(5)
        ->get();
        return response()->json($productosmasvendidosxcantidad);
    }
    public function productosmayorprecio(){
        $productosmayorprecio = DB::table('articulos')
        ->join('ventas','articulos.id','=','ventas.id_articulo')
        ->select('articulos.detalle', DB::raw('MAX(ventas.valor) as valorarticulo'))
        ->groupBy('articulos.detalle')
        ->orderByDesc('ventas.valor')
        ->limit(10)
        ->get();
        return response()->json($productosmayorprecio);
    }
    public function productosmenorprecio(){
        $productosmenorprecio = DB::table('articulos')
        ->join('ventas','articulos.id','=','ventas.id_articulo')
        ->select('articulos.detalle', DB::raw('MAX(ventas.valor) as valorarticulo'))
        ->groupBy('articulos.detalle')
        ->orderByRaw('ventas.valor ASC')
        ->limit(10)
        ->get();
        return response()->json($productosmenorprecio);
    }
    public function cantidadproductosxtipovendidos(){
        $cantidadproductosxtipovendidos = DB::table('articulos')
        ->join('ventas','articulos.id','=','ventas.id_articulo')
        ->join('tipos','articulos.id_tipo','=','tipos.id')
        ->select('tipos.detalle', DB::raw('COUNT(ventas.id) as ventas'))
        ->groupBy('tipos.detalle')
        ->orderByRaw('COUNT(ventas.id) Desc')
        ->get();
        return response()->json($cantidadproductosxtipovendidos);
    }
    public function cantidadproductosvendidos(){
        $cantidadproductosvendidos = DB::table('articulos')
        ->join('ventas','articulos.id','=','ventas.id_articulo')
        ->join('tipos','articulos.id_tipo','=','tipos.id')
        ->select(DB::raw('COUNT(ventas.id) as ventas'))
        ->get();
        return response()->json($cantidadproductosvendidos);
    }
    public function totalventas(){
        $totalventas = DB::table('articulos')
        ->select(DB::raw('SUM(articulos.valorventa) as total_ventas'))
        ->get();
        return response()->json($totalventas);
    }
    public function totalcompras(){
        $totalcompras = DB::table('articulos')
        ->select(DB::raw('SUM(articulos.valorcompra) as totalcompra'))
        ->get();
        return response()->json($totalcompras);
    }
    public function sumastock(){
        $sumastock = DB::table('articulos')
        ->select(DB::raw('SUM(articulos.stock) as totalstock'))
        ->get();
        return response()->json($sumastock);
    }
    public function sumacantidad(){
        $sumacantidad = DB::table('ventas')
        ->select(DB::raw('SUM(ventas.cantidad) as totalcantidad'))
        ->get();
        return response()->json($sumacantidad);
    }
    public function sumacantidadcomprados(){
        $sumacantidadcomprados = DB::table('compras')
        ->select(DB::raw('SUM(compras.cantidad) as totalcantidad'))
        ->get();
        return response()->json($sumacantidadcomprados);
    }
    public function productosmayoralpromedioventas(){

        $productosmayoralpromedioventas = DB::table('ventas')
        ->join('articulos','ventas.id_articulo','=','articulos.id')
        ->select('articulos.detalle','ventas.totalventa')->distinct()
        ->where('ventas.totalventa', '>', function ($query) {
            $query->selectRaw('AVG(ventas.totalventa)')->from('ventas');
        } )
        ->groupBy('articulos.detalle')
        ->limit(5)
        ->get();
        return response()->json($productosmayoralpromedioventas);
    }
    public function productosmenoralpromedioventas(){

        $productosmenoralpromedioventas = DB::table('ventas')
        ->join('articulos','ventas.id_articulo','=','articulos.id')
        ->select('articulos.detalle','ventas.totalventa')
        ->where('ventas.totalventa', '<', function ($query) {
            $query->selectRaw('AVG(ventas.totalventa)')->from('ventas');
        } )
        ->groupBy('articulos.detalle')
        ->orderByRaw('ventas.totalventa ASC')
        ->limit(5)
        ->get();
        return response()->json($productosmenoralpromedioventas);
    }
    public function ventaxultimoano(){

        $productosmenoralpromedioventas = DB::table('ventas')
        ->select(\DB::raw('MONTH(ventas.created_at) `mes`'), \DB::raw('SUM(ventas.totalventa) `totalventa`'),\DB::raw( 'COUNT(ventas.codventa) `countventa`'))
        ->whereYear('ventas.created_at', '2022')
        ->groupBy(\DB::raw('`mes`'))
        ->get();
        return response()->json($productosmenoralpromedioventas);
    }
    public function ventaactualmes(){

        $ventaactualmes = DB::table('ventas')
        ->select(\DB::raw('DAY(ventas.created_at) `dia`'), \DB::raw('SUM(ventas.totalventa) `totalventa`'),\DB::raw( 'COUNT(ventas.codventa) `countventa`'))
        ->whereMonth('ventas.created_at', Carbon::now())
        ->whereYear('ventas.created_at', Carbon::now())
        ->groupBy(\DB::raw('`dia`'))
        ->get();
        return response()->json($ventaactualmes);
    }
    public function ventaxtipo()
    {
        $ventaxtipo = DB::table('ventas')
        ->join('articulos','ventas.id_articulo','=','articulos.id')
        ->join('tipos','articulos.id_marca','=','tipos.id')
        ->select('tipos.detalle', DB::raw('SUM(ventas.totalventa) as total_ventas'))
        ->groupBy('tipos.detalle')
        ->orderByRaw('SUM(ventas.totalventa) Desc')
        ->get();
        return response()->json($ventaxtipo);
    }
    public function articulosnovendidos()
    {
        $articulosnovendidos = DB::table('articulos')
        ->leftJoin('ventas', 'articulos.id', '=', 'ventas.id_articulo')
        ->select('articulos.detalle')->distinct()
        ->whereNull('ventas.id_articulo')
        ->get();
        return response()->json($articulosnovendidos);
    }

    public function articulosmenorigual()
    {
        $articulosmenorigual = DB::table('ventas')
        ->join('articulos', 'ventas.id_articulo', '=', 'articulos.id')
        ->select('articulos.detalle', \DB::raw('COUNT(ventas.id_articulo) `count`'))
        ->groupBy('articulos.detalle')
        ->orderByRaw('COUNT(ventas.id_articulo) Asc')
        ->limit(10)
        ->get();
        return response()->json($articulosmenorigual);
    }
    public function cantidadexistenxmarca()
    {
        $cantidadexistenxmarca = DB::table('articulos')
        ->join('marcas', 'articulos.id_marca', '=', 'marcas.id')
        ->select('marcas.detalle', \DB::raw('COUNT(articulos.id_marca) `count`'))->distinct()
        ->groupBy('marcas.detalle','articulos.id_marca')
        ->orderByRaw('COUNT(articulos.id_marca) desc')
        ->limit(10)
        ->get();
        return response()->json($cantidadexistenxmarca);
    }
    public function t10ultimos()
    {
        $t10ultimos = DB::table('articulos')
        ->join('ventas', 'articulos.id', '=', 'ventas.id_articulo')
        ->select('articulos.detalle',\DB::raw('DATE(ventas.created_at) as date'))   
        ->orderByRaw('ventas.id desc')
        ->limit(10)
        ->get();
        return response()->json($t10ultimos);
    }

}