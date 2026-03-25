@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col">
            <h1 class="display-6">Registrar Abono al Préstamo #{{ $prestamo->id }}</h1>
            <p class="text-muted">Captura los detalles del pago recibido.</p>
        </div>
    </div>

    <div class="card shadow-sm" style="max-width: 550px;">
        <div class="card-header bg-dark text-white">
            Detalles del Movimiento
        </div>
        <div class="card-body">
            <form action="/movimientos/abonos/{{ $prestamo->id }}/guardar" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-bold">Fecha del Abono:</label>
                    <input type="date" name="fecha_abono" class="form-control" 
                           value="{{ date('Y-m-d') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-success">Abono a Capital ($):</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" name="abono_capital" 
                                   class="form-control border-success" placeholder="0.00" required>
                        </div>
                        <small class="text-muted">Monto que reduce la deuda.</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-primary">Interés ($):</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" name="interes" 
                                   class="form-control border-primary" placeholder="0.00" required>
                        </div>
                        <small class="text-muted">Ganancia por el préstamo.</small>
                    </div>
                </div>

                <hr>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="bi bi-check-circle"></i> Guardar Abono
                    </button>
                    <a href="/movimientos/abonos/{{ $prestamo->id }}" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection