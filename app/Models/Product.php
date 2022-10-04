<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',         //el codigo se generara en el controlador
        'name',
        'stock',
        'image',
        'sell_price',
        'status',
        'category_id',
        'provider_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class); //pertenece a una categoria
    }


    public function provider(){
        return $this->belongsTo(Provider::class);//pertenece a una proveedor
    }

}









