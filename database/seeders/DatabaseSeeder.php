<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Category::create([
            'id' => '1',
            'name' => 'elektronik'
        ]);

        Category::create([
            'id' => '2',
            'name' => 'alat sholat'
        ]);

        Product::create([
            'nama' => 'Monitor',
            'price' => '200000',
            'stock' => '10',
            'description' => 'Monitor LG'

        ]);
        
        Product::create([
            'nama' => 'Mouse',
            'price' => '500000',
            'stock' => '5',
            'description' => 'Mouse LG'

        ]);
    }
}
