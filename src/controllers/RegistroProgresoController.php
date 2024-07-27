<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "circuito_oscar_crespo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$numero = $_POST['numero'];
$numero_vuelta = $_POST['numero_vuelta'];
$hora_llegada = $_POST['hora_llegada'];

$sql = "SELECT id FROM coche WHERE numero = '$numero'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $coche_id = $row['id'];

    $sql_vuelta = "SELECT id, hora_salida FROM vuelta WHERE coche_id = '$coche_id' AND numero_vuelta = '$numero_vuelta'";
    $result_vuelta = $conn->query($sql_vuelta);
    if ($result_vuelta->num_rows > 0) {
        $row_vuelta = $result_vuelta->fetch_assoc();
        $vuelta_id = $row_vuelta['id'];
        $hora_salida = $row_vuelta['hora_salida'];

        $tiempo_vuelta = (strtotime($hora_llegada) - strtotime($hora_salida)) / 3600; // Tiempo en horas
        $distancia_vuelta = 5; // Distancia de la vuelta en kilómetros (puedes cambiarla según sea necesario)
        $velocidad = calculate_speed($distancia_vuelta, $tiempo_vuelta);
        $tiempo_acumulado = calculate_accumulated_time($conn, $coche_id, $numero_vuelta, $tiempo_vuelta);

        $sql_update = "UPDATE vuelta SET hora_llegada='$hora_llegada', tiempo_vuelta=SEC_TO_TIME($tiempo_vuelta * 3600), velocidad='$velocidad', tiempo_acumulado=SEC_TO_TIME($tiempo_acumulado * 3600) WHERE id='$vuelta_id'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Progreso registrado con éxito.";
        } else {
            echo "Error: " . $sql_update . "<br>" . $conn->error;
        }
    } else {
        echo "No se encontró la vuelta especificada.";
    }
} else {
    echo "No se encontró el coche especificado.";
}

$conn->close();

function calculate_speed($distancia_vuelta, $tiempo_vuelta) {
    // Implementar la fórmula para calcular la velocidad en km/h
    if ($tiempo_vuelta > 0) {
        $velocidad = $distancia_vuelta / $tiempo_vuelta;
        return $velocidad;
    }
    return 0; // Evitar división por cero
}

function calculate_accumulated_time($conn, $coche_id, $numero_vuelta, $tiempo_vuelta) {
    // Inicializar el tiempo acumulado con el tiempo de la vuelta actual
    $tiempo_acumulado = $tiempo_vuelta;

    // Obtener los tiempos de vuelta anteriores del coche
    $sql = "SELECT tiempo_vuelta FROM vuelta WHERE coche_id = ? AND numero_vuelta < ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $coche_id, $numero_vuelta);
    $stmt->execute();
    $result = $stmt->get_result();

    // Sumar los tiempos de vuelta anteriores al tiempo acumulado
    while ($row = $result->fetch_assoc()) {
        $tiempo_acumulado += (strtotime($row['tiempo_vuelta']) / 3600);
    }

    return $tiempo_acumulado;
}
?>
