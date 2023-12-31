<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    public function saldo()
    {
        return $this->hasOne(Saldo::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
