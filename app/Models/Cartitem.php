<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVarians;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cartitem extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = ['cart_id','product_id','product_varian_id','jumlah_product','sub_total'];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productvarians(): BelongsTo
    {
        return $this->belongsTo(ProductVarians::class, 'product_varian_id');
    }

}
