<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Orderitem extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = ['order_id','product_id','jumlah_product','price_at_product','sub_total'];
}
