<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use App\Models\Printing;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Production extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'dateprod',
        'equipe',
        'quart',
        'structure_id',
        'line_id',
        'product_id',
        'production_id',
    ];

//     public function printings()
// {
//     return $this->belongsTo(Printing::class);
// }
public function printings()
{
    return $this->hasMany(Printing::class, 'production_id','id');
}

// public function product()
// {
//     return $this->belongsTo(Product::class ,'product_id', 'id');
// }
public function structure()
{
    return $this->belongsTo(Structure::class ,'structure_id', 'id');
}
public function line()
{
    return $this->belongsTo(Line::class ,'line_id', 'id');
}
public static function boot()
        {

            parent::boot();

            static::creating(function ($model) {
                $year = Carbon::now()->format('y');
                $model->production_id = IdGenerator::generate(['table' => 'productions', 'field' => 'production_id', 'length' => 11, 'prefix' => 'PRD'.$year]);
            });
        }
        public static function bootp()
        {
            parent::bootp();

            static::deleting(function ($production) {
                if ($production->printings()->count() > 0) {
                    return false; // Annule la suppression
                }
            });
        }
}
