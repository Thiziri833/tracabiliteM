<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'wilaya',
        'activite',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }

    public static function boot()
        {
            parent::boot();

            static::creating(function ($model) {
                $year = Carbon::now()->format('y');
                $model->code = IdGenerator::generate(['table' => 'customers', 'field' => 'code', 'length' => 11, 'prefix' => 'CST'.$year]);
            });
        }
}
