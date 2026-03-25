@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col">
            <h1>Catálogo de Puestos</h1>
        </div>
        <div class="col text-end">
            <a href="/catalogos/puestos/agregar" class="btn btn-success">+ Nuevo Puesto</a>
        </div>
    </div>

    <table class="table table-striped" id="maintable">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Sueldo</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($puestos as $puesto)
                <tr>
                    <td>{{ $puesto->id }}</td>
                    <td>{{ $puesto->nombre }}</td>
                    <td>${{ number_format($puesto->sueldo, 2) }}</td>
                    <td class="text-center">
                        <a href="/catalogos/puestos/{{ $puesto->id }}/modificar" class="btn btn-warning btn-sm">Modificar</a>
                        <a href="/catalogos/puestos/{{ $puesto->id }}/eliminar" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar el puesto {{ $puesto->nombre }}?')">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection