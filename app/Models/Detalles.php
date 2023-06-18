<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    use HasFactory;

    protected $table = 'detalles';
    protected $primaryKey = 'iddetalles';
    public $timestamps = true;

    protected $fillable = [ 
        'detallepedido',
        'anotaciones',
        'idpedido',
        'idproducto'
    ];

    // Relación con la tabla Pedido
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idpedido');
    }
    // Relación con la tabla Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idproducto');
    }
}
