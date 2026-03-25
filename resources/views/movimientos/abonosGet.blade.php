@extends("components.layout")

@section("content")
    <div class="row my-4">
        <div class="col">
            <h1>Abonos del Préstamo #{{ $prestamo->id }}</h1>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body bg-light">
            {{-- Cambiado: apellido (sin S) --}}
            <p class="mb-1"><strong>EMPLEADO:</strong> {{ $prestamo->empleado->nombre }} {{ $prestamo->empleado->apellido }}</p>
            
            {{-- Cambiado: fecha_aprob --}}
            <p class="mb-1"><strong>FECHA APROBACIÓN:</strong> {{ $prestamo->fecha_aprob }}</p>
            
            {{-- Cambiado: monto --}}
            <p class="mb-0"><strong>MONTO PRESTADO:</strong> ${{ number_format($prestamo->monto, 2) }}</p>
        </div>
    </div>

    <div class="mb-3">
        <a href="/movimientos/abonos/{{ $prestamo->id }}/nuevo" class="btn btn-success">+ Agregar Nuevo Abono</a>
        <a href="/movimientos/prestamos" class="btn btn-secondary">Volver a Préstamos</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>NUM DE ABONO</th>
                <th>FECHA</th>
                <th>MONTO CAPITAL</th>
                <th>MONTO INTERES</th>
                <th>MONTO COBRADO</th>
                <th>SALDO PENDIENTE</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php
                // Usamos 'monto' que es el nombre real en tu SQL
                $saldo = $prestamo->monto; 
                $total_capital = 0;
                $total_interes = 0;
                $total_cobrado = 0;
            @endphp

            @foreach($prestamo->abonos as $index => $abono)
                @php
                    $cobrado = $abono->abono_capital + $abono->interes;
                    $saldo -= $abono->abono_capital;

                    $total_capital += $abono->abono_capital;
                    $total_interes += $abono->interes;
                    $total_cobrado += $cobrado;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $abono->fecha_abono }}</td>
                    <td>${{ number_format($abono->abono_capital, 2) }}</td>
                    <td>${{ number_format($abono->interes, 2) }}</td>
                    <td>${{ number_format($cobrado, 2) }}</td>
                    <td>${{ number_format($saldo, 2) }}</td>
                </tr>
            @endforeach
            
            <tr class="table-secondary fw-bold">
                <td colspan="2" class="text-end">TOTALES:</td>
                <td>${{ number_format($total_capital, 2) }}</td>
                <td>${{ number_format($total_interes, 2) }}</td>
                <td>${{ number_format($total_cobrado, 2) }}</td>
                <td class="bg-dark text-white">${{ number_format($saldo, 2) }}</td>
            </tr>
        </tbody>
    </table>
@endsection