<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteCampañaSaldo extends Model
{
    use HasFactory;

    protected $table = 'cliente_campaña_saldos';

    protected $fillable = [
        'campaña_id',
        'cliente_id',
        'saldo',
    ];
}
