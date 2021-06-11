<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status_pedido_id',
        'obs',
        'cpf',
        'forma_pag_id',
        'cupom_id',
        'total',
    ];
}
