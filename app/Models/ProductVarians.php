<?php

namespace App\Models;

use App\Models\Orderitem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVarians extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = ['product_id','weight','price_weight'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function orderitems()
    {
        return $this->belongsTo(Orderitem::class);
    }


}
