<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\DishesCategory;

class DishesCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        //
        DishesCategory::create(['name'=>'Bebidas','logo'=>'placeholder.jpg']);
        DishesCategory::create(['name'=>'Desayunos','logo'=>'placeholder.jpg']);
        DishesCategory::create(['name'=>'Comidas','logo'=>'placeholder.jpg']);
        DishesCategory::create(['name'=>'Postres','logo'=>'placeholder.jpg']);

    }
}
