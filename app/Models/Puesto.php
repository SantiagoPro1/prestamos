<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'sueldo',
    ];

    public function detEmpPuestos()
    {
        return $this->hasMany(Detalle_Emp_puesto::class, 'puesto_id', 'id');
    }

    public function prestamosGet()
    {
        $prestamos = Prestamo::with('empleado')->get();

        return view('movimientos.prestamosGet', compact('prestamos'));
    }
}
