<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishesCategory extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'dishes_categories_id');
    }
    
}
