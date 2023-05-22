<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Line;


class Structure extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name'];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function lines()
    {
        return $this->hasMany(Line::class, 'structure_id','id');
    }
    public function productions()
    {
        return $this->hasMany(Production::class, 'structure_id','id');
    }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($structure) {
    //         if ($structure->lines()->count() > 0) {
    //             throw new \Exception("Impossible de supprimer la structure car elle possède des lignes associées.");
    //         }
    //     });
    // }


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($structure) {
    //         if ($structure->lines()->count() > 0) {
    //             throw new \Exception('Cette structure ne peut pas être supprimée car elle possède des lignes associées.');
    //         }
    //     });
    // }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($structure) {
    //         if ($structure->lines()->count() > 0) {
    //             return false; // Annule la suppression
    //         }
    //     });
    // }
    public static function boot()
{
    parent::boot();

    static::deleting(function ($structure) {
        if ($structure->lines()->count() > 0) {
            return false; // Annule la suppression
        }
    });
}
}
