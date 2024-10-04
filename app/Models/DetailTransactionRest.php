<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransactionRest extends Model
{
    use HasFactory;

  
    protected $table = 'details_transaction_rest'; 

    protected $fillable = [
        'invoice_number',
        'dishes_categories_id',
        'registered_dishes_id',
        'payment_method_id',
        'registered_dishes_price',
        'total',
        'note',
    ];
}
