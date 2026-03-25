<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Emp_Puesto extends Model
{
    use HasFactory;

    protected $table = 'Detalle_Emp_Puesto';
    protected $primaryKey = 'id_emp_puesto';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_empleado',
        'id_puesto',
        'fecha_inicio',
        'fecha_fin'
    ];

    public $timestamps = false;

    // Relaciones
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado', 'id_empleado');
    }

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'id_puesto', 'id_puesto');
    }
}