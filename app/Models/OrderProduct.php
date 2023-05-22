<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TheHiddenHaku\SerialShippingContainerCode\SerialShippingContainerCode;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantite',
    ];
}
