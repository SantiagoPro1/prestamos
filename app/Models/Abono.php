<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    use HasFactory;

    // Los campos exactos que tienes en tu tabla de la base de datos
    protected $fillable = [
        'prestamo_id',
        'fecha_abono',
        'abono_capital',
        'interes'
    ];

    // Relación: Un abono pertenece a un préstamo
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class, 'prestamo_id', 'id');
    }
}