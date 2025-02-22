<?php

namespace App\Models;

use App\Models\Categorie;
use App\Models\ProductVarians;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['categorie_id','name','price'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function productvarians()
    {
        return $this->hasMany(ProductVarians::class);
    }
    

}
