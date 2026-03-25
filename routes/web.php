<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogosController;

Route::get('/', [CatalogosController::class, 'home']);

Route::get('/catalogos/puestos', [CatalogosController::class, 'puestosGet']);

Route::get("/empleados", [CatalogosController::class, "empleadosGet"]);
Route::get("/empleados/agregar", [CatalogosController::class, "empleadosAgregarGet"]);
Route::post("/empleados/agregar", [CatalogosController::class, "empleadosAgregarPost"]);
Route::get("/movimientos/prestamos", [CatalogosController::class, "prestamosGet"]);
Route::get("/movimientos/prestamos/agregar", [CatalogosController::class, "prestamosAgregarGet"]);
Route::post("/movimientos/prestamos/agregar", [CatalogosController::class, "prestamosAgregarPost"]);
Route::get("/movimientos/prestamos/{id}/modificar", [CatalogosController::class, "prestamosModificarGet"]);
Route::post("/movimientos/prestamos/{id}/modificar", [CatalogosController::class, "prestamosModificarPost"]);
Route::get("/movimientos/prestamos/{id}/eliminar", [CatalogosController::class, "prestamosEliminar"]);
Route::get("/movimientos/abonos/{id}", [CatalogosController::class, "abonosGet"]);
Route::get("/movimientos/abonos/{id}/nuevo", [CatalogosController::class, "abonosCreate"]); 
Route::post("/movimientos/abonos/{id}/guardar", [CatalogosController::class, "abonosStore"]);
Route::get("/empleados/{id}/modificar", [CatalogosController::class, "empleadosModificarGet"]);
Route::post("/empleados/{id}/modificar", [CatalogosController::class, "empleadosModificarPost"]);
Route::get("/empleados/{id}/eliminar", [CatalogosController::class, "empleadosEliminar"]);
Route::get("/reportes", [CatalogosController::class, "reportesGet"]);
Route::get("/salir", [CatalogosController::class, "salir"]);
Route::get('/', [CatalogosController::class, 'home']);
Route::get('/catalogos/puestos', [CatalogosController::class, 'puestosGet']);
Route::get('/catalogos/puestos/agregar', [CatalogosController::class, 'puestosAgregarGet']);
Route::post('/catalogos/puestos/agregar', [CatalogosController::class, 'puestosAgregarPost']);
Route::get('/catalogos/puestos/{id}/modificar', [CatalogosController::class, 'puestosModificarGet']);
Route::post('/catalogos/puestos/{id}/modificar', [CatalogosController::class, 'puestosModificarPost']);
Route::get('/catalogos/puestos/{id}/eliminar', [CatalogosController::class, 'puestosEliminar']);