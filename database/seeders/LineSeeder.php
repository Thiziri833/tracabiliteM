<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $line = Line::create([
        'structure_id' => 2,
        'name' => 'Ligne A',
        'description' => ''
    ]);
       $line = Line::create([
        'structure_id' => 2,
        'name' => 'Ligne B',
        'description' => '',
    ]);
       $line = Line::create([
        'structure_id' => 2,
        'name' => 'Ligne C',
        'description' => '',
    ]);
    $line = Line::create([
        'structure_id' => 1,
        'name' => 'Ligne 1L',
        'description' => '',
    ]);
    $line = Line::create([
        'structure_id' => 1,
        'name' => 'Ligne 2L',
        'description' => '',
    ]);
    $line = Line::create([
        'structure_id' => 1,
        'name' => 'Ligne 5L',
        'description' => '',
    ]);
    $line = Line::create([
        'structure_id' => 3,
        'name' => 'Ligne 1',
        'description' => '',
    ]);
    $line = Line::create([
        'structure_id' => 3,
        'name' => 'Ligne 2',
        'description' => '',
    ]);
    $line = Line::create([
        'structure_id' => 3,
        'name' => 'Ligne 3',
        'description' => '',
    ]);
       $line->save();
    }
}
