<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'order_id',
        'numBC',
        'depotdest',
        'dateorder',
        'customer_id',
        'order_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('id','quantity');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    protected $dates =['deleted_at'];
    public static function boot()
        {

            parent::boot();

            static::creating(function ($model) {
                $year = Carbon::now()->format('y');
                $model->order_id = IdGenerator::generate(['table' => 'orders', 'field' => 'order_id', 'length' => 11, 'prefix' => 'ORD'.$year]);
            });
        }
}
