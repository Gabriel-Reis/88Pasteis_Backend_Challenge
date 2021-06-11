<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pastel_pedido extends Model
{
    use HasFactory;
    protected $table = 'pastel_pedido';

     protected $fillable = [
        'quantidade',
        'pastel_id',
        'pedido_id',
    ];

    
}
