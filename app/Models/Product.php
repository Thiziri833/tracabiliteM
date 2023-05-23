<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'code', 'description','DLUO',
    ];
    public function lines()
    {
        return $this->hasMany(Line::class);
    }
    public function productions()
    {
        return $this->hasMany(Production::class,'product_id', 'id');
    }
    public function pallets(){
        return $this->hasMany(Pallet::class);
        }

 public function line()
{
    return $this->belongsTo(line::class, 'line_id', 'id');
}

    protected $dates =['deleted_at']; 
}

