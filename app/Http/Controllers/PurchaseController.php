<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Provider;
use App\Models\Product;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;

class PurchaseController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }

    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }


    public function create()
    {
        $providers = Provider::get();
        $products = Product::where('status', 'ACTIVE')->get(); // si estado es igual al producto activo, recien mostrara ese producto
        return view('admin.purchase.create', compact('providers', 'products'));

    }


    public function store(StorePurchaseRequest $request)
    {

        // dd($request);
        $purchase = Purchase::create($request->all()+[
            'user_id' =>  Auth::user()->id,
            'purchase_date' => Carbon::now("America/La_Paz"),
        ]
    );

        foreach ($request ->product_id as $key => $product) {

                $results[] = array("product_id" => $request->product_id[$key],
                "quantity" => $request->quantity[$key], "price" => $request->price[$key]);

        }

        $purchase -> PurchaseDetails()->createMany($results);

        return redirect()->route('admin.purchases.index');

    }


    public function show(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach($purchaseDetails as $key => $purchaseDetail) {
        $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.show', compact('purchase',"purchaseDetails","subtotal"));

    }


    public function edit(Purchase $purchase)
    {
        $providers = Provider::get();
        return view('admin.purchase.edit', compact('providers'));
    }


    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }


    public function destroy(Purchase $purchase)
    {
        // $purchase->delete();
        // return redirect()->route('purchases.index');
    }

    public function pdf(Purchase $purchase){
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach($purchaseDetails as $key => $purchaseDetail) {
        $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase','subtotal','purchaseDetails'));

        return $pdf->download('Reporte_de_compra_'.$purchase->id.'.pdf');
        // return view('admin.purchase.show', compact('purchase',"purchaseDetails","subtotal"));
    }

    public function subir(Request $reques, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }

    public function cambiar_estado(Purchase $purchase)
    {
        if ($purchase->status == 'VALID') {
            $purchase ->update(['status'=>'CANCELED']);
            return redirect()->back();
            // $purchase->update(['status'=>'CANCELED']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } else {
            $purchase ->update(['status'=>'VALID']);
            return redirect()->back();
            // $purchase->update(['status'=>'VALID']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        }
    }
}

