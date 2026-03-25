<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'telefono', 'direccion'];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function puestos()
    {
        return $this->belongsToMany(Puesto::class, 'detalle_emp_puestos')
            ->withPivot('fecha_asignacion');
    }
}
