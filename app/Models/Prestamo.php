<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model {
    // Tu SQL tiene: id, empleado_id, monto, estatus, fecha_aprob
    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }

    public function abonos() {
        return $this->hasMany(Abono::class);
    }
}