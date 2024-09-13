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

    public function dishes()
    {
        return $this->hasMany(RegisteredDish::class, 'subcategories_id');
    }
}
