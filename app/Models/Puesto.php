<?php

namespace App\Models;

use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'sueldo'
    ];

    public function detEmpPuestos()
    {
        // Cambiamos DetEmpPuesto por Detalle_Emp_puesto
        return $this->hasMany(Detalle_Emp_puesto::class, 'puesto_id', 'id');
    }

    public function prestamosGet(){
        // Consultamos los préstamos y los unimos con su empleado
        $prestamos = Prestamo::with('empleado')->get(); 

        // Retornamos la vista y le pasamos los datos
        return view('movimientos.prestamosGet', compact('prestamos'));
    }
}