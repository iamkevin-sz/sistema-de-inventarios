<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Sale;
use App\Models\Product;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;
use App\Models\Reporte;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }


    public function create()
    {
        $products = Product::get();
        $clients = Client::get();
        return view('admin.sale.create', compact('clients', 'products'));

    }


    public function store(StoreSaleRequest $request)
    {

        $sale = Sale::create($request->all()+[
            'user_id' =>  Auth::user()->id,
            'sale_date' => Carbon::now('America/La_Paz'),
        ]);   //almacena el ide de la venta

        foreach ($request ->product_id as $key => $product) {

                $result[] = array("product_id" => $request->product_id[$key],
                "quantity" => $request->quantity[$key], "price" => $request->price[$key],
                "descount" => $request->descount[$key]);

        }

        $sale -> saleDetails()->createMany($result);

        return redirect()->route('admin.sales.index');

    }


    public function show(Sale $sale)
    {

        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach($saleDetails as $key => $saleDetail) {
        $subtotal += $saleDetail->quantity * $saleDetail->price - (($saleDetail->quantity * $saleDetail->price)*$saleDetail->descount/100);
        }
        return view('admin.sale.show', compact('sale','saleDetails','subtotal'));

    }


    public function edit(Sale $sale)
    {
        $providers = Provider::get();
        return view('admin.sale.edit', compact('providers'));
    }


    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        // $sale->update($request->all());
        // return redirect()->route('sales.index');
    }


    public function destroy(Sale $sale)
    {
        // $sale->delete();
        // return redirect()->route('sales.index');
    }

    public function pdf(Sale $sale){
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach($saleDetails as $key => $saleDetail) {
        $subtotal += $saleDetail->quantity * $saleDetail->price;
        }

        $pdf = PDF::loadView('admin.sale.pdf', compact('sale','subtotal','saleDetails'));

        return $pdf->download('Reporte_de_venta_'.$sale->id.'.pdf');
        // return view('admin.purchase.show', compact('purchase',"purchaseDetails","subtotal"));
    }

    public function cambiar_estado(Sale $sale)
    {
        if ($sale->status == 'VALID') {
            $sale ->update(['status'=>'CANCELED']);
            return redirect()->back();
            // $purchase->update(['status'=>'CANCELED']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } else {
            $sale ->update(['status'=>'VALID']);
            return redirect()->back();
            // $purchase->update(['status'=>'VALID']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        }
    }
}

