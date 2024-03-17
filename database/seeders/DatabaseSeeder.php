<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
  

    public function run(): void
    {
        $json = File::get(database_path('data/dishes.json'));
        $data = json_decode($json);
        foreach ($data->dishes as $dish) {
            Dish::create([
                'name' => $dish->name,
                'restaurant' => $dish->restaurant,
                'availableMeals' => json_encode($dish->availableMeals)
            ]);
        }
        
    }
}
