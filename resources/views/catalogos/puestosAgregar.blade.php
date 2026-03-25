@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col">
            <h1>Alta de Puesto</h1>
        </div>
    </div>
    <div class="card shadow-sm" style="max-width: 500px;">
        <div class="card-body">
            <form action="/catalogos/puestos/agregar" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre del Puesto:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Sueldo Base ($):</label>
                    <input type="number" step="0.01" name="sueldo" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Guardar Puesto</button>
            </form>
        </div>
    </div>
@endsection