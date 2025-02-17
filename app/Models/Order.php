<?php

namespace App\Models;

use App\Models\User;
use App\Models\Checkout;
use App\Models\Orderitem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = ['user_id','total_harga','is_paid'];

    public function orderitems()
    {
        return $this->hasMany(Orderitem::class);
    }

    // Relasi ke tabel `users`
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkout()
{
    return $this->hasOne(Checkout::class, 'order_id');
}
}
