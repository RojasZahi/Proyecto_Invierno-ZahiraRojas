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

$id = $_POST['id'];
$numero = $_POST['numero'];
$nombre_piloto = $_POST['nombre_piloto'];
$nombre_copiloto = $_POST['nombre_copiloto'];
$detalles_coche = $_POST['detalles_coche'];

$sql = "UPDATE coche SET numero='$numero', nombre_piloto='$nombre_piloto', nombre_copiloto='$nombre_copiloto', detalles_coche='$detalles_coche' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../views/coches.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
