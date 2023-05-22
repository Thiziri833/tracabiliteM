<?php

namespace Database\Seeders;

use App\Models\ProductLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productline = ProductLine::create([
            'product_id' => 1,
                'line_id' => 4,
                'cadence' => 10,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline = ProductLine::create([
            'product_id' => 2,
                'line_id' => 5,
                'cadence' => 20,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline = ProductLine::create([
            'product_id' => 3,
                'line_id' => 6,
                'cadence' => 30,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline = ProductLine::create([
            'product_id' => 4,
                'line_id' => 1,
                'cadence' => 10,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline = ProductLine::create([
            'product_id' => 4,
                'line_id' => 2,
                'cadence' => 10,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline = ProductLine::create([
            'product_id' => 4,
                'line_id' => 3,
                'cadence' => 10,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline = ProductLine::create([
            'product_id' => 5,
                'line_id' => 2,
                'cadence' => 12,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline = ProductLine::create([
            'product_id' => 6,
                'line_id' => 3,
                'cadence' => 15,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline = ProductLine::create([
            'product_id' => 7,
                'line_id' => 7,
                'cadence' => 10,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline = ProductLine::create([
            'product_id' => 8,
                'line_id' => 8,
                'cadence' => 5,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline = ProductLine::create([
            'product_id' => 8,
                'line_id' => 9,
                'cadence' => 8,
                'uniteprod' => 'Plt',
                'quantite' => 250,
            ]);
        $productline->save();
    }
}
