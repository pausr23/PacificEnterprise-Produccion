<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = ['name', 'dishes_categories_id'];

    public function category()
    {
        return $this->belongsTo(DishesCategory::class, 'dishes_categories_id'); // Asegúrate de que 'dishes_categories_id' es la clave foránea correcta
    }

    public function dishes()
    {
        return $this->hasMany(RegisteredDish::class, 'subcategories_id');
    }
}
