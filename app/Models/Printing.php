<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Production;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class Printing extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'dateimp',
        'quantite',
        'LOT',
        'date_inst',
        'user_id',
        'production_id',
        'printing_id',
    ];


    public function production()
{
    return $this->belongsTo(Production::class ,'production_id', 'id');
}
    public function pallets(){
        return $this->hasMany(Pallet::class ,'priting_id','id');
        }
        public static function boot()
        {
            // parent::boot();

            // static::creating(function ($model) {
            //     $year = Carbon::now()->format('Y');
            //     $model->printing_id = IdGenerator::generate(['table' => 'printings', 'field' => 'printing_id', 'length' => 11, 'prefix' => 'PRN'.$year]);
            // });
            parent::boot();

            static::creating(function ($model) {
                $year = Carbon::now()->format('y');
                $model->printing_id = IdGenerator::generate(['table' => 'printings', 'field' => 'printing_id', 'length' => 11, 'prefix' => 'PRN'.$year]);
            });
        }
}
