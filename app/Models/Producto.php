<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Producto extends Model
{
    protected $table = 'producto';
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'idcategoria',
        'imagen',
    ];
    protected $hidden = [
        'existencias',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $primaryKey = 'idproducto';
}
