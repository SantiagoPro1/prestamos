@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col">
            <h1>Modificar Empleado: {{ $empleado->nombre }}</h1>
        </div>
    </div>

    <div class="card shadow-sm" style="max-width: 600px;">
        <div class="card-body">
            <form action="/empleados/{{ $empleado->id }}/modificar" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $empleado->nombre }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Apellido:</label>
                        <input type="text" name="apellido" class="form-control" value="{{ $empleado->apellido }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Teléfono:</label>
                        <input type="text" name="telefono" class="form-control" value="{{ $empleado->telefono }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Dirección:</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $empleado->direccion }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Puesto Actual:</label>
                    <select name="puesto_id" class="form-select" required>
                        @foreach($puestos as $p)
                            <option value="{{ $p->id }}" {{ $empleado->puestos->contains($p->id) ? 'selected' : '' }}>
                                {{ $p->nombre }} - (${{ number_format($p->sueldo_mensual, 2) }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning w-100">Actualizar Datos</button>
                    <a href="/empleados" class="btn btn-light w-100 mt-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection