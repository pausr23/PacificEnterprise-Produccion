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
       'purchase_price',
       'sale_price',
       'description',
       'units',
       'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

        public function category()
    {
        return $this->belongsTo(DishesCategory::class, 'dishes_categories_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategories_id');
    }
    
}
