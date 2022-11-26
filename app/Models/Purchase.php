<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'user_id',
        'purchase_date',
        'tax',
        'total',
        'status',
        'picture',
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function provider(){
        return $this->belongsTo(provider::class);
    }

    public function PurchaseDetails(){
        return $this->hasMany(PurchaseDetails::class);
    }
}
