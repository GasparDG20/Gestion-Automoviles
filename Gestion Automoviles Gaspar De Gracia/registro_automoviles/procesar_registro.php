<?php
include 'includes/Database.php';
include 'includes/Automovil.php';

$database = new Database();
$db = $database->getConnection();
$automovil = new Automovil($db);

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'registrar':
        $automovil->marca = $_POST['marca'];
        $automovil->modelo = $_POST['modelo'];
        $automovil->anio = $_POST['anio'];
        $automovil->color = $_POST['color'];
        $automovil->placa = $_POST['placa'];
        $automovil->motor = $_POST['motor'];
        $automovil->chasis = $_POST['chasis'];
        $automovil->tipo = $_POST['tipo'];
        
        if ($automovil->registrar()) {
            header("Refresh: 5; url=registrar_automovil.php");
            echo "Automóvil registrado exitosamente.";
        } else {
            echo "Error al registrar el automóvil.";
        }
        break;

    case 'buscar':
        $criterio = $_POST['criterio'] ?? '';
        $resultado = $automovil->buscar($criterio);
        
        if ($resultado->rowCount() > 0) {
            header("Refresh: 5; url=registrar_automovil.php");
            echo "<h2>Resultados de la búsqueda:</h2>";
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "ID: {$row['id']}, Marca: {$row['marca']}, Modelo: {$row['modelo']}, Año: {$row['anio']}, Color: {$row['color']}, Placa: {$row['placa']}, Motor: {$row['motor']}, Chasis: {$row['chasis']}, tipo: {$row['tipo']}<br>";
            }
        } else {
            header("Refresh: 5; url=registrar_automovil.php");
            echo "No se encontraron resultados.";
        }
        break;

    case 'eliminar':
        $automovil->id = $_POST['id'] ?? 0;
        
        if ($automovil->eliminar()) {
            header("Refresh: 5; url=registrar_automovil.php");
            echo "Automóvil eliminado exitosamente.";
        } else {
            header("Refresh: 5; url=registrar_automovil.php");
            echo "Error al eliminar el automóvil.";
        }
        break;

    case 'actualizar':
        $automovil->id = $_POST['id'];
        $automovil->marca = $_POST['marca'];
        $automovil->modelo = $_POST['modelo'];
        $automovil->anio = $_POST['anio'];
        $automovil->color = $_POST['color'];
        $automovil->placa = $_POST['placa'];
        $automovil->placa = $_POST['motor'];
        $automovil->chasis = $_POST['chasis'];
        $automovil->tipo = $_POST['tipo'];


        if ($automovil->actualizar()) {
            header("Refresh: 5; url=registrar_automovil.php");
            echo "Automóvil actualizado exitosamente.";
        } else {
            header("Refresh: 5; url=registrar_automovil.php");
            echo "Error al actualizar el automóvil.";
        }
        break;

    default:
        header("Refresh: 5; url=registrar_automovil.php");
        echo "Acción no válida.";
}


