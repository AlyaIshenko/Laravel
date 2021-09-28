<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'short_description',
        'SKU',
        'price',
        'discount',
        'in_stock',
        'thumbnail',

    ];

    public function gallery()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function getPrice()
    {
        $price = is_null($this->discount) ? $this->price : ($this->price - ($this->price * ($this->discount / 100)));
        return round($price, 2);
    }
}
