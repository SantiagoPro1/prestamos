<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model {
    use HasFactory;

    // Tu SQL tiene: id, nombre, apellido, telefono, direccion
    protected $fillable = ['nombre', 'apellido', 'telefono', 'direccion'];

    public function prestamos() {
        return $this->hasMany(Prestamo::class);
    }

    // Relación con puestos a través de la tabla detalle_emp_puestos
public function puestos() {
    return $this->belongsToMany(Puesto::class, 'detalle_emp_puestos')
                ->withPivot('fecha_asignacion'); // 👈 Le avisamos que existe esta columna
}
}