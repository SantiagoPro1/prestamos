<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function abonos()
    {
        return $this->hasMany(Abono::class);
    }
}
