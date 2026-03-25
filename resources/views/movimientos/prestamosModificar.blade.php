@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col">
            <h1>Modificar Préstamo ID: {{ $prestamo->id }}</h1>
        </div>
    </div>

    <div class="card shadow-sm" style="max-width: 600px;">
        <div class="card-body">
            <form action="/movimientos/prestamos/{{ $prestamo->id }}/modificar" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Empleado:</label>
                    <select name="empleado_id" class="form-select" required>
                        @foreach($empleados as $e)
                            <option value="{{ $e->id }}" {{ $prestamo->empleado_id == $e->id ? 'selected' : '' }}>
                                {{ $e->nombre }} {{ $e->apellido }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Monto:</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" step="0.01" name="monto" class="form-control" value="{{ $prestamo->monto }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Fecha de Aprobación:</label>
                        <input type="date" name="fecha_aprob" class="form-control" value="{{ $prestamo->fecha_aprob }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Fecha Fin Descuento:</label>
                        <input type="date" name="fecha_fin_des" class="form-control" value="{{ $prestamo->fecha_fin_des }}" required>
                    </div>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="estatusSwitch" name="estatus" value="1" {{ $prestamo->estatus ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="estatusSwitch">Préstamo Activo</label>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning w-100">Actualizar Préstamo</button>
                    <a href="/movimientos/prestamos" class="btn btn-light w-100 mt-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
