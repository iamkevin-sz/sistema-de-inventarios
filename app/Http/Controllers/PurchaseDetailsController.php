<?php

namespace App\Http\Controllers;

use App\Models\PurchaseDetails;
use App\Models\Purchase;
use App\Models\Product;

use App\Http\Requests\StorePurchaseDetailsRequest;
use App\Http\Requests\UpdatePurchaseDetailsRequest;

class PurchaseDetailsController extends Controller
{
    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }


    public function create()
    {
        $providers = Provider::get();
        return view('admin.purchase.create', compact('providers'));

    }


    public function store(StorePurchaseRequest $request)
    {
        $purchase = Purchase::create($request->all());
        return redirect()->route('purchases.index');

    }


    public function show(Purchase $purchase)
    {
        return view('admin.purchase.show', compact('purchase'));

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
}
