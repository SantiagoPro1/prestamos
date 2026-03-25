<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Préstamos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        body { display: flex; min-height: 100vh; margin: 0; background-color: #f4f6f9;}
        .sidebar { width: 250px; background-color: #212529; color: white; padding: 20px; }
        .sidebar a { color: white; text-decoration: none; display: block; padding: 10px; margin-bottom: 5px; border-radius: 5px; }
        .sidebar a:hover { background-color: #343a40; }
        .content { flex-grow: 1; padding: 30px; background-color: #ffffff; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4>Sistema de Préstamos</h4>
        <hr>
        <a href="/catalogos/puestos">Puestos</a>
        <a href="/empleados">Empleados</a>
        <a href="/movimientos/prestamos">Préstamos</a>
        <a href="/reportes">Reportes</a>
        <a href="/salir">Salir</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            if ($('#maintable').length) {
                let table = new DataTable("#maintable", {paging:true, searching:true});
            }
        });
    </script>
</body>
</html>