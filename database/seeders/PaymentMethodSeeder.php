<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PaymentMethod::create(['name'=>'Tarjeta']);
        PaymentMethod::create(['name'=>'Efectivo']);
        PaymentMethod::create(['name'=>'SinpeMovil']);
    }
}
