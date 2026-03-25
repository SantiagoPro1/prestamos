@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col">
            <h1>Reporte General de Préstamos</h1>
        </div>
    </div>

    <div class="row mb-4 text-center">
        <div class="col-md-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h5>Total Prestado</h5>
                    <h3>${{ number_format($totalPrestado, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h5>Total Recuperado</h5>
                    <h3>${{ number_format($totalAbonado, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h5>Saldo por Cobrar</h5>
                    <h3>${{ number_format($saldoPendiente, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">Resumen de Cuentas por Empleado</div>
        <div class="card-body">
            <table class="table table-hover" id="maintable">
                <thead>
                    <tr>
                        <th>Empleado</th>
                        <th>Monto Original</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestamos as $p)
                    <tr>
                        <td>{{ $p->empleado->nombre }} {{ $p->empleado->apellido }}</td>
                        <td>${{ number_format($p->monto, 2) }}</td> 
                        <td>
                            @if($p->estatus)
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-secondary">Inactivo</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection