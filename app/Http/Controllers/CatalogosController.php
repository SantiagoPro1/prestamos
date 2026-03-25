<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;
use App\Models\Prestamo;
use App\Models\Abono; // <-- Importante para que funcione el guardado
use App\Models\Empleado; // <--- AGREGA ESTA LÍNEA QUE FALTA


class CatalogosController extends Controller
{
    public function puestosGet(){
        $puestos = Puesto::all(); 
        return view('catalogos.puestosGet', compact('puestos'));
    }

    public function prestamosGet(){
        $prestamos = Prestamo::with('empleado')->get(); 
        return view('movimientos.prestamosGet', compact('prestamos'));
    }

    public function prestamosAgregarGet() {
        $empleados = Empleado::all();
        return view('movimientos.prestamosAgregar', compact('empleados'));
    }

    public function prestamosAgregarPost(Request $request) {
        $p = new Prestamo();
        $p->empleado_id = $request->input('empleado_id');
        $p->monto = $request->input('monto');
        $p->fecha_aprob = $request->input('fecha_aprob');
        $p->fecha_fin_des = $request->input('fecha_fin_des');
        $p->estatus = $request->has('estatus') ? 1 : 0;
        $p->save();
        return redirect('/movimientos/prestamos');
    }

    public function prestamosModificarGet($id) {
        $prestamo = Prestamo::findOrFail($id);
        $empleados = Empleado::all();
        return view('movimientos.prestamosModificar', compact('prestamo', 'empleados'));
    }

    public function prestamosModificarPost(Request $request, $id) {
        $p = Prestamo::findOrFail($id);
        $p->empleado_id = $request->input('empleado_id');
        $p->monto = $request->input('monto');
        $p->fecha_aprob = $request->input('fecha_aprob');
        $p->fecha_fin_des = $request->input('fecha_fin_des');
        $p->estatus = $request->has('estatus') ? 1 : 0;
        $p->save();
        return redirect('/movimientos/prestamos');
    }

    public function prestamosEliminar($id) {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();
        return redirect('/movimientos/prestamos');
    }

public function abonosGet($id) {
    // Usamos findOrFail para que traiga SOLO UN objeto, no una colección
    $prestamo = Prestamo::with('empleado', 'abonos')->findOrFail($id);
    return view('movimientos.abonosGet', compact('prestamo'));
}

    // Esta es la función que te faltaba para mostrar el formulario
    public function abonosCreate($id){
        $prestamo = Prestamo::findOrFail($id);
        return view('movimientos.abonosCreate', compact('prestamo'));
    }

    // Esta es la función que te faltaba para guardar en la base de datos
public function abonosStore(Request $request, $id) {
    $nuevo = new Abono();
    $nuevo->prestamo_id = $id;
    $nuevo->fecha_abono = $request->input('fecha_abono');
    
    // Nombres reales de tu tabla 'abonos' en el SQL
    $nuevo->abono_capital = $request->input('abono_capital');
    $nuevo->interes = $request->input('interes');
    
    $nuevo->save();
    return redirect("/movimientos/abonos/" . $id);
}
public function empleadosGet(){
    $empleados = Empleado::with('puestos')->get(); 
    return view('catalogos.empleadosGet', compact('empleados'));
}
    public function empleadosAgregarGet(){
    // Consultamos los puestos para llenar el "Select" del formulario
    $puestos = Puesto::all();
    return view('catalogos.empleadosAgregar', compact('puestos'));
    }

public function empleadosAgregarPost(Request $request){
    $e = new Empleado();
    $e->nombre = $request->input('nombre');
    $e->apellido = $request->input('apellido'); // Singular y único
    $e->telefono = $request->input('telefono');
    $e->direccion = $request->input('direccion');
    $e->save();

    if($request->has('puesto_id')) {
        $e->puestos()->attach($request->input('puesto_id'), [
            'fecha_asignacion' => now()
        ]);
    }
    return redirect('/empleados');
}
    public function empleadosModificarGet($id) {
        // Buscamos al empleado
        $empleado = Empleado::findOrFail($id);
        // Traemos TODOS los puestos para que aparezcan en el select
        $puestos = Puesto::all(); 
        
        // Mandamos AMBAS cosas a la vista
        return view('catalogos.empleadosModificar', compact('empleado', 'puestos'));
    }

public function empleadosModificarPost(Request $request, $id){
    $e = Empleado::findOrFail($id);
    $e->nombre = $request->input('nombre');
    $e->apellido = $request->input('apellido');
    $e->telefono = $request->input('telefono');
    $e->direccion = $request->input('direccion');
    $e->save();

    if($request->has('puesto_id')) {
        $e->puestos()->sync([
            $request->input('puesto_id') => ['fecha_asignacion' => now()]
        ]);
    }
    return redirect('/empleados');
}
    public function empleadosEliminar($id){
        // Buscamos al empleado
        $empleado = Empleado::findOrFail($id);
        
        // Lo eliminamos de la base de datos
        $empleado->delete();

        // Regresamos a la lista con un mensaje (opcional)
        return redirect('/empleados');
    }
public function reportesGet() {
    // Tu SQL usa 'monto' en prestamos y 'abono_capital' en abonos
    $totalPrestado = Prestamo::sum('monto'); 
    $totalAbonado = Abono::sum('abono_capital');
    $saldoPendiente = $totalPrestado - $totalAbonado;
    
    $prestamos = Prestamo::with('empleado')->get();

    return view('reportes.index', compact('totalPrestado', 'totalAbonado', 'saldoPendiente', 'prestamos'));
}
    public function salir() {
        // Por ahora, simplemente regresamos al inicio
        return redirect('/');
    }

        public function home(){
        // Hacemos los cálculos rápidos para el Dashboard
        $totalPrestado = Prestamo::sum('monto');
        $totalAbonado = Abono::sum('abono_capital');
        $saldoPendiente = $totalPrestado - $totalAbonado;
        
        // Contamos cuántos empleados hay en total
        $totalEmpleados = Empleado::count();

        return view("inicio", compact('totalPrestado', 'totalAbonado', 'saldoPendiente', 'totalEmpleados'));
    }
    // --- PUESTOS CRUD ---
    public function puestosAgregarGet() {
        return view('catalogos.puestosAgregar');
    }

public function puestosAgregarPost(Request $request) {
    $p = new Puesto();
    $p->nombre = $request->input('nombre');
    $p->sueldo_mensual = $request->input('sueldo_mensual'); // Nombre real en tu SQL
    $p->save();
    return redirect('/catalogos/puestos');
}

    public function puestosModificarGet($id) {
        $puesto = Puesto::findOrFail($id);
        return view('catalogos.puestosModificar', compact('puesto'));
    }

    public function puestosModificarPost(Request $request, $id) {
        $puesto = Puesto::findOrFail($id);
        $puesto->nombre = $request->input('nombre');
        $puesto->sueldo = $request->input('sueldo');
        $puesto->save();
        return redirect('/catalogos/puestos');
    }

    public function puestosEliminar($id) {
        $puesto = Puesto::findOrFail($id);
        $puesto->delete();
        return redirect('/catalogos/puestos');
    }
}