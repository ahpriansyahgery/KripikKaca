<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Cartitem extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = ['cart_id','product_id','jumlah_product','sub_total'];
}
