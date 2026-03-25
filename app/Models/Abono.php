<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    use HasFactory;

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