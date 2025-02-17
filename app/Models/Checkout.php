<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = ['order_id','no_hp','address'];


    /**
     * Get the order that owns the Checkout
     *
     
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class,);
    }
}
