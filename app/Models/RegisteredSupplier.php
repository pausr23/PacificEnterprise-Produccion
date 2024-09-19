<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredSupplier extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'phone_number',
        'email',
        'note',
     ];
 
     protected $hidden = [
         'created_at',
         'updated_at',
     ];
}
