<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Line extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'structure_id',
    ];
    // public function products()
    // {
    //     return $this->hasMany(product::class);
    // }
    public function structure()
    {
        return $this->belongsTo(Structure::class, 'structure_id', 'id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'line_product')->withPivot('id','cadence', 'uniteprod', 'quantite');
    }
    public function productions()
    {
        return $this->hasMany(Production::class, 'line_id','id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($line) {
            if ($line->products()->count() > 0) {
                return false; // Annule la suppression
            }
        });
    }
}
