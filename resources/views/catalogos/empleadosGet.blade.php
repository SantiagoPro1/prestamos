@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col">
            <h1>Catálogo de Empleados</h1>
        </div>
        <div class="col text-end">
            <a href="/empleados/agregar" class="btn btn-success">+ Nuevo Empleado</a>
        </div>
    </div>

    <table class="table table-striped" id="maintable">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th> <th>Teléfono</th> <th>Dirección</th> <th>Puesto</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellido }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->direccion }}</td>
                <td>
                    <span class="badge bg-info text-dark">
                        {{ $empleado->puestos->first()->nombre ?? 'Sin Puesto' }}
                    </span>
                </td>
                <td class="text-center">
                    <a href="/empleados/{{ $empleado->id }}/modificar" class="btn btn-warning btn-sm">Modificar</a>
                    <a href="/empleados/{{ $empleado->id }}/eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection