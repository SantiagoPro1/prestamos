@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col">
            <h1>Movimientos: Lista de Préstamos</h1>
        </div>
        <div class="col text-end">
            <a href="/movimientos/prestamos/agregar" class="btn btn-success">+ Nuevo Préstamo</a>
        </div>
    </div>

    <table class="table table-striped" id="maintable">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID Préstamo</th>
                <th scope="col">Empleado</th>
                <th scope="col">Fecha Aprobación</th>
                <th scope="col">Monto Prestado</th>
                <th scope="col">Estatus</th>
                <th scope="col">Acciones</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($prestamos as $prestamo)
                <tr>
                    <td class="text-center">{{ $prestamo->id }}</td>
                    <td>{{ $prestamo->empleado->nombre }} {{ $prestamo->empleado->apellido }}</td> 
                    <td class="text-center">{{ $prestamo->fecha_aprob }}</td>
                    <td>${{ number_format($prestamo->monto, 2) }}</td>
                    <td>
                        @if($prestamo->estatus)
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-secondary">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm mb-1" href="/movimientos/abonos/{{ $prestamo->id }}">Abonos</a>
                        <a href="/movimientos/prestamos/{{ $prestamo->id }}/modificar" class="btn btn-warning btn-sm mb-1">Modificar</a>
                        <a href="/movimientos/prestamos/{{ $prestamo->id }}/eliminar" class="btn btn-danger btn-sm mb-1" onclick="return confirm('¿Eliminar préstamo?')">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection