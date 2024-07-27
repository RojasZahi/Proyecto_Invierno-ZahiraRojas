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

$id = $_GET['id'];

// Eliminar vueltas asociadas al coche
$sql_vueltas = "DELETE FROM vuelta WHERE coche_id='$id'";
if ($conn->query($sql_vueltas) === TRUE) {
    // Luego eliminar el coche
    $sql_coche = "DELETE FROM coche WHERE id='$id'";
    if ($conn->query($sql_coche) === TRUE) {
        header("Location: ../views/coches.php");
        exit();
    } else {
        echo "Error al eliminar el coche: " . $conn->error;
    }
} else {
    echo "Error al eliminar las vueltas: " . $conn->error;
}

$conn->close();
?>
