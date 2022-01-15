<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';

    protected $fillable = [
        'transaction_id',
        'prod_id',
        'prod_qty',
        'price',
    ];

    public function furnitures()
    {
        return $this->belongsTo(Furniture::class, 'prod_id', 'id');
    }
}
