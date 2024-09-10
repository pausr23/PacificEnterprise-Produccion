<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Subcategory;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Subcategory::create(['name'=>'Jugos','dishes_categories_id'=>'1']);
        Subcategory::create(['name'=>'Naturales','dishes_categories_id'=>'1']);
        Subcategory::create(['name'=>'Bebidas Energeticas','dishes_categories_id'=>'1']);
        Subcategory::create(['name'=>'Cervezas','dishes_categories_id'=>'1']);
        Subcategory::create(['name'=>'Destilados','dishes_categories_id'=>'1']);
        Subcategory::create(['name'=>'Cocteles','dishes_categories_id'=>'1']);
        Subcategory::create(['name'=>'Gaseosas','dishes_categories_id'=>'1']);
        Subcategory::create(['name'=>'Bebidas Calientes','dishes_categories_id'=>'1']);
        Subcategory::create(['name'=>'Platos','dishes_categories_id'=>'2']);
        Subcategory::create(['name'=>'Agregados','dishes_categories_id'=>'2']);
        Subcategory::create(['name'=>'Panaderia','dishes_categories_id'=>'4']);
        Subcategory::create(['name'=>'Reposteria','dishes_categories_id'=>'4']);
        Subcategory::create(['name'=>'Comidas Rapidas','dishes_categories_id'=>'3']);
        Subcategory::create(['name'=>'Especialidades','dishes_categories_id'=>'3']);
    }
}
