<?php
// Configura PHP para mostrar todos los errores.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define el número de empleados y crea un arreglo para almacenar los objetos de empleado.
$num_empleados = 6;
$empleados = array();

// Crea objetos para cada empleado y los agrega al arreglo $empleados.
$empleados[] = (object) array('id' => 1, 'nombre' => 'ivan', 'apellidos' => 'salamanca', 'rango' => 'vendedor', 'salario' => 30000.0, 'lugar' => 'ventas');
// El operador (object) convierte un array asociativo en un objeto.
// Aquí se está creando un objeto con las propiedades id, nombre, apellidos, rango, salario y lugar, y se agrega al arreglo $empleados.
// Este proceso se repite para cada empleado.

// Define una función para mostrar los detalles de un empleado.
function mostrar_empleado($e) {
    echo "id: " . $e->id . ", nombre: " . $e->nombre . " " . $e->apellidos . ", rango: " . $e->rango
        . ", salario: " . $e->salario . ", lugar: " . $e->lugar . "<br>";
}

// Define una función para mostrar los detalles de todos los empleados.
function mostrar_empleados($empleados) {
    foreach ($empleados as $empleado) {
        mostrar_empleado($empleado);
    }
}

// Define una función para buscar un empleado por su ID.
function buscar_por_id($empleados, $id) {
    foreach ($empleados as $empleado) {
        if ($empleado->id == $id) {
            mostrar_empleado($empleado);
            return;
        }
    }
    echo "empleado no encontrado.<br>";
}

// Se definen funciones similares para buscar empleados por nombre, ascenso, salario, lugar.

// Define una función para ordenar los empleados según la opción seleccionada.
function ordenar_empleados(&$empleados, $opcion) {
    switch ($opcion) {
        case 1:
            usort($empleados, function($a, $b) {
                return $a->id - $b->id;
            });
            break;
        case 2:
            usort($empleados, function($a, $b) {
                return strcasecmp($a->nombre, $b->nombre);
            });
            break;
        case 3:
            usort($empleados, function($a, $b) {
                return $a->salario - $b->salario;
            });
            break;
        default:
            echo "opcion de ordenamiento no valida.<br>";
    }
}

// Se verifica si la solicitud es de tipo POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se obtiene la opción seleccionada.
    $opcion = $_POST['opcion'];
    // Se ejecuta la acción correspondiente según la opción seleccionada.
    switch ($opcion) {
        case '1':
            mostrar_empleados($empleados);
            break;
        case '2':
            $id = $_POST['id'];
            buscar_por_id($empleados, $id);
            break;
        // Se repiten los casos para cada acción posible.
    }
}
?>


