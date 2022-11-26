<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;

class ReporteController extends Controller
{
    function reportes_dia(){

        $sales = Sale::whereDate('sale_date', Carbon::today('America/La_Paz'))->get();  //carbon today pone la fecha actual y lo que hace es comparar sale date con la fecha actual
        $total = $sales->sum('total');
        return view('admin.reporte.reportes_dia', compact('sales', 'total'));

    }

    function reportes_fecha(){
        $sales = Sale::whereDate('sale_date', Carbon::today('America/La_Paz'))->get();
        $total = $sales->sum('total');
        return view('admin.reporte.reportes_fecha', compact('sales', 'total'));
    }

    function reporte_resultado(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $sales = Sale::whereBetween('sale_date', [$fi, $ff])->get();
        $total = $sales->sum('total');
        return view('admin.reporte.reportes_fecha', compact('sales', 'total'));
    }
}









