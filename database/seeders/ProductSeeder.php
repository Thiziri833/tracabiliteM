<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = product::create([
            'code' => 'Elio1L',
            'description' => 'Huile Elio 1L',
            'DLUO' => 720,
        ]);
        $product = product::create([
            'code' => 'Elio2L',
            'description' => 'Huile Elio 2L',
            'DLUO' => 720,
        ]);
        $product = product::create([
            'code' => 'Elio5L',
            'description' => 'Huile Elio 5L',
            'DLUO' => 720,
        ]);
        $product = product::create([
            'code' => 'Skor1Kg',
            'description' => 'Sucre Sachet 1Kg',
            'DLUO' => 720,
        ]);
        $product = product::create([
            'code' => 'Skor2Kg',
            'description' => 'Sucre Sachet 2Kg',
            'DLUO' => 720,
        ]);
        $product = product::create([
            'code' => 'Skor5Kg',
            'description' => 'Sucre Sachet 5Kg',
            'DLUO' => 720,
        ]);
        $product = product::create([
            'code' => 'Matina400',
            'description' => 'Margarnie Matina 400g',
            'DLUO' => 180,
        ]);
        $product = product::create([
            'code' => 'Fleurial500',
            'description' => 'Margarine Fleurial 500g',
            'DLUO' => 360,
        ]);
        $product->save();
    }
}
