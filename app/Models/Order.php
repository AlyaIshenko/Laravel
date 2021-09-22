<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'surname',
    //     'email',
    //     'phone',
    //     'country',
    //     'city',
    //     'address',
    //     'total'

    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity', 'single_price');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}