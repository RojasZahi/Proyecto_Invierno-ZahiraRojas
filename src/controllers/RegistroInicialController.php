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

$numero_vueltas = $_POST['numero_vueltas'];
$numero = $_POST['numero'];
$nombre_piloto = $_POST['nombre_piloto'];
$nombre_copiloto = $_POST['nombre_copiloto'];
$detalles_coche = $_POST['detalles_coche'];
$hora_salida = $_POST['hora_salida'];

$sql_coche = "INSERT INTO coche (numero, nombre_piloto, nombre_copiloto, detalles_coche) VALUES ('$numero', '$nombre_piloto', '$nombre_copiloto', '$detalles_coche')";
if ($conn->query($sql_coche) === TRUE) {
    $coche_id = $conn->insert_id;
    $sql_carrera = "INSERT INTO carrera (nombre, numero_vueltas, fecha) VALUES ('Carrera', '$numero_vueltas', CURDATE())";
    if ($conn->query($sql_carrera) === TRUE) {
        $carrera_id = $conn->insert_id;
        $sql_vuelta = "INSERT INTO vuelta (coche_id, carrera_id, numero_vuelta, hora_salida) VALUES ('$coche_id', '$carrera_id', 1, '$hora_salida')";
        if ($conn->query($sql_vuelta) === TRUE) {
            header("Location: ../views/coches.php"); // Redirigir a la página de coches
            exit();
        } else {
            echo "Error: " . $sql_vuelta . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql_carrera . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql_coche . "<br>" . $conn->error;
}

$conn->close();
?>
