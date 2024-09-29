<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\JobTitle;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        JobTitle::create(['title'=>'Administrador']);
        JobTitle::create(['title'=>'Cajero']);
        JobTitle::create(['title'=>'Cocinero']);
        JobTitle::create(['title'=>'Regular']);
    }
}
