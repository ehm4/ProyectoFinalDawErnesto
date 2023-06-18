<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $primaryKey = 'idpedido';
    public $timestamps = true;

    protected $fillable = [
        'total',
        'idcliente',
        'iddetalles',
        'update_at'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente');
    }

    public function detalles()
    {
        return $this->belongsTo(Detalles::class, 'iddetalles');
    }
}
