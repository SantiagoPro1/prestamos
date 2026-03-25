@extends("components.layout")

@section("content")
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-5 fw-bold">Panel de Control: Sistema de Préstamos</h1>
                <p class="text-muted">Resumen general del sistema al día de hoy.</p>
            </div>
        </div>

        <div class="row mb-5 text-center">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm bg-dark text-white">
                    <div class="card-body">
                        <h6>Empleados Activos</h6>
                        <h2 class="fw-bold">{{ $totalEmpleados }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <h6>Total Prestado</h6>
                        <h2 class="fw-bold">${{ number_format($totalPrestado, 0) }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm bg-success text-white">
                    <div class="card-body">
                        <h6>Total Recuperado</h6>
                        <h2 class="fw-bold">${{ number_format($totalAbonado, 0) }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm bg-danger text-white">
                    <div class="card-body">
                        <h6>Por Recuperar</h6>
                        <h2 class="fw-bold">${{ number_format($saldoPendiente, 0) }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center mt-5">
            <div class="col-md-12">
                <div class="p-4 bg-light rounded-3 border">
                    <p class="fs-5">¿Qué deseas gestionar ahora?</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="/empleados" class="btn btn-primary">Ir a Empleados</a>
                        <a href="/movimientos/prestamos" class="btn btn-secondary">Revisar Préstamos</a>
                        <a href="/reportes" class="btn btn-info text-white">Ver Reporte Detallado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection