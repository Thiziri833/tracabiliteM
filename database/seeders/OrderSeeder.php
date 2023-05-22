<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::create([
            'numBC' => 23001474,
            'depotdest' => 'Oran',
            'dateorder' => '2023-05-08',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001464,
            'depotdest' => 'Alger',
            'dateorder' => '2023-05-07',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001438,
            'depotdest' => 'Bouira',
            'dateorder' => '2023-05-07',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001423,
            'depotdest' => 'Constantine',
            'dateorder' => '2023-05-06',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001397,
            'depotdest' => 'Oran',
            'dateorder' => '2023-05-06',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001378,
            'depotdest' => 'Alger',
            'dateorder' => '2023-05-05',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001376,
            'depotdest' => 'Bouira',
            'dateorder' => '2023-05-05',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001367,
            'depotdest' => 'Constantine',
            'dateorder' => '2023-05-04',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001352,
            'depotdest' => 'Oran',
            'dateorder' => '2023-05-04',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001350,
            'depotdest' => 'Alger',
            'dateorder' => '2023-05-03',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001339,
            'depotdest' => 'Bouira',
            'dateorder' => '2023-05-03',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001335,
            'depotdest' => 'Constantine',
            'dateorder' => '2023-05-02',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001330,
            'depotdest' => 'Oran',
            'dateorder' => '2023-05-02',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001317,
            'depotdest' => 'Alger',
            'dateorder' => '2023-05-01',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001307,
            'depotdest' => 'Bouira',
            'dateorder' => '2023-05-01',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001470,
            'depotdest' => 'Constantine',
            'dateorder' => '2023-05-08',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001476,
            'depotdest' => 'Bouira',
            'dateorder' => '2023-05-09',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001484,
            'depotdest' => 'Alger',
            'dateorder' => '2023-05-09',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001480,
            'depotdest' => 'Oran',
            'dateorder' => '2023-05-10',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001485,
            'depotdest' => 'Constantine',
            'dateorder' => '2023-05-10',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001489,
            'depotdest' => 'Bouira',
            'dateorder' => '2023-05-11',
            'customer_id' => 1,
        ]);
        $order = Order::create([
            'numBC' => 23001499,
            'depotdest' => 'Alger',
            'dateorder' => '2023-05-11',
            'customer_id' => 1,
        ]);
        $order->save();
    }
}
