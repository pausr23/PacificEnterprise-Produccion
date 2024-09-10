<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredDish extends Model
{
    use HasFactory;

    protected $fillable= [
       'dishes_categories_id',
       'subcategories_id',
       'title',
       'dish_price',
       'description',
       'image',
    ];
    
}
