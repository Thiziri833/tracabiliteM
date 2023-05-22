<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TheHiddenHaku\SerialShippingContainerCode\SerialShippingContainerCode;

class Pallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'SSCC',
        'datefab',
        'DLC',
        'product_id',
        'priting_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function printing()
{
    return $this->belongsTo(Printing::class ,'priting_id', 'id');
}
public static function boot()
    {
        parent::boot();

        static::creating(function ($pallet) {
            // Récupérer le préfixe depuis votre fichier .env
            $prefix = env('SSCC_PREFIX');
            // Générer un nouvel identifiant avec 9 chiffres
            $id = IdGenerator::generate(['table'=>'pallets','field' => 'SSCC', 'length' => 17, 'prefix'=>$prefix]);
            // Créer une instance de la classe SerialShippingContainerCode
            $ssccCode =  new SerialShippingContainerCode('');
            // Appeler la méthode calculate() pour obtenir le SSCC complet
            $sscc = $ssccCode->calculate($id);
            // Assigner la valeur générée au champ SSCC du modèle
            $pallet->SSCC = $sscc;
        });
    }
}




