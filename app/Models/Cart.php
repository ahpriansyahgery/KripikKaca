<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Cart extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = ['user_id','total_harga'];

     // Relasi ke tabel `cart_item`
     public function cartitems()
     {
         return $this->hasMany(CartItem::class);
     }
 
     // Relasi ke tabel `users`
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
