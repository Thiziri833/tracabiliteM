<?php

namespace Database\Seeders;

use App\Models\Pallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pallet = Pallet::create([
        ]);
    }
}
