<?php
$conn = new mysqli("localhost", "root", "", "circuito_oscar_crespo");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $nombre_piloto = $_POST["nombre_piloto"];
    $nombre_copiloto = $_POST["nombre_copiloto"];
    $detalles_coche = $_POST["detalles_coche"];

    $sql = "INSERT INTO coche (numero, nombre_piloto, nombre_copiloto, detalles_coche) VALUES ('$numero', '$nombre_piloto', '$nombre_copiloto', '$detalles_coche')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo coche agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

header("Location: coches.php");
exit();
?>
