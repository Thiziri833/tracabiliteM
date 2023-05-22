<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionTableSeeder::class,
            AdminUserSeeder::class,
            StructureSeeder::class,
            LineSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            // ProductLineSeeder::class,
            OrderSeeder::class,
            // OrderProductSeeder::class,
        ]);
    }
}
