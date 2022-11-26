<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ReporteController;


Route::get('admin ', function (){
    return 'hola mundo';
});

// Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('purchases/pdf/{purchase}', [PurchaseController::class, 'pdf'])->name('purchases.pdf');

Route::get('sales/pdf/{sale}', [SaleController::class, 'pdf'])->name('sales.pdf');
//subir archivos
Route::get('purchases/subir/{purchase}', [PurchaseController::class, 'subir'])->name('subir.purchases');

//Cambiar Estado producctos
Route::get('cambiar_estado/products/{product}', [ProductController::class, 'cambiar_estado'])->name('cambiar.estado.products');

//Cambiar Estado compras
Route::get('cambiar_estado/purchases/{purchase}', [PurchaseController::class, 'cambiar_estado'])->name('cambiar.estado.purchases');

//Cambiar Estado ventas
Route::get('cambiar_estado/sales/{sale}', [SaleController::class, 'cambiar_estado'])->name('cambiar.estado.sales');

//reportes por dia
Route::get('sales/reportes_dia', [ReporteController::class, 'reportes_dia'])->name('reportes.dia');

//reportes por fecha, tipo post para enviar fecha actual y fecha desde que se quiere tomar el registro
Route::get('sales/reportes_fecha', [ReporteController::class, 'reportes_fecha'])->name('reportes.fecha');

//para hacer consulta usaremos post
Route::post('sales/reporte_resultado', [ReporteController::class, 'reporte_resultado'])->name('reporte.resultado');


Route::resource('categories', CategoryController::class)->names('categories');
Route::resource('clients', ClientController::class)->names('clients');
Route::resource('products', ProductController::class)->names('products');
Route::resource('providers', ProviderController::class)->names('providers');
Route::resource('purchases', PurchaseController::class)->names('purchases');
Route::resource('sales', SaleController::class)->names('sales');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users'); //stamos diciendo que solo nos cree esas tres rutas







