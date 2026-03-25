@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col">
            <h1>Alta de Nuevo Empleado</h1>
        </div>
    </div>

    <div class="card shadow-sm" style="max-width: 600px;">
        <div class="card-body">
            <form action="/empleados/agregar" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej. Diana" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Apellido:</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Ej. García" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Teléfono:</label>
                        <input type="text" name="telefono" class="form-control" placeholder="Opcional">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Dirección:</label>
                        <input type="text" name="direccion" class="form-control" placeholder="Opcional">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Asignar Puesto:</label>
                    <select name="puesto_id" class="form-select" required>
                        <option value="">Seleccione un puesto...</option>
                        @foreach($puestos as $p)
                            <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100 mt-3">Registrar Empleado</button>
            </form>
        </div>
    </div>
@endsection