<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = Customer::create([
            'name' => 'Client 01',
            'wilaya' => 'Bejaia',
            'activite' => 'Distribution',
        ]);
        $customer = Customer::create([
            'name' => 'Client 02',
            'wilaya' => 'Bejaia',
            'activite' => 'Industrie',
        ]);
        $customer = Customer::create([
            'name' => 'Client 03',
            'wilaya' => 'Bejaia',
            'activite' => 'Produit Laitiers',
        ]);
        $customer = Customer::create([
            'name' => 'Client 04',
            'wilaya' => 'Bejaia',
            'activite' => 'Distribution',
        ]);
        $customer = Customer::create([
            'name' => 'Client 05',
            'wilaya' => 'Bejaia',
            'activite' => 'Distribution',
        ]);
        $customer = Customer::create([
            'name' => 'Client 06',
            'wilaya' => 'Bejaia',
            'activite' => 'Dépot',
        ]);
        $customer = Customer::create([
            'name' => 'Client 07',
            'wilaya' => 'Bejaia',
            'activite' => 'Distribution',
        ]);
        $customer = Customer::create([
            'name' => 'Client 08',
            'wilaya' => 'Bejaia',
            'activite' => 'Aliments',
        ]);
        $customer = Customer::create([
            'name' => 'Client 09',
            'wilaya' => 'Bejaia',
            'activite' => 'Distribution',
        ]);
        $customer = Customer::create([
            'name' => 'Client 10',
            'wilaya' => 'Bejaia',
            'activite' => 'Sucrerie',
        ]);
        $customer = Customer::create([
            'name' => 'Client 11',
            'wilaya' => 'Bejaia',
            'activite' => 'Distribution',
        ]);
        $customer = Customer::create([
            'name' => 'Client 12',
            'wilaya' => 'Bejaia',
            'activite' => 'Distribution',
        ]);
        $customer->save();
    }
}
