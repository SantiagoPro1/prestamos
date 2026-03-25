@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col"><h1>Modificar Puesto: {{ $puesto->nombre }}</h1></div>
    </div>
    <div class="card shadow-sm" style="max-width: 500px;">
        <div class="card-body">
            <form action="/catalogos/puestos/{{ $puesto->id }}/modificar" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre del Puesto:</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $puesto->nombre }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Sueldo Base ($):</label>
                    <input type="number" step="0.01" name="sueldo" class="form-control" value="{{ $puesto->sueldo }}" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Actualizar Puesto</button>
            </form>
        </div>
    </div>
@endsection