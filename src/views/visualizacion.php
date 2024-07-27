<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visualización de Datos</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Datos de la Carrera</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Número de Vuelta</th>
            <th>Número de Coche</th>
            <th>Nombre del Piloto</th>
            <th>Hora de Salida</th>
            <th>Hora de Llegada</th>
            <th>Tiempo de Vuelta</th>
            <th>Velocidad (km/h)</th>
            <th>Tiempo Acumulado</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $conn = new mysqli("localhost", "root", "", "circuito_oscar_crespo");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT v.numero_vuelta, c.numero, c.nombre_piloto, v.hora_salida, v.hora_llegada, v.tiempo_vuelta, v.velocidad, v.tiempo_acumulado 
                FROM vuelta v
                JOIN coche c ON v.coche_id = c.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['numero_vuelta']}</td>
                        <td>{$row['numero']}</td>
                        <td>{$row['nombre_piloto']}</td>
                        <td>{$row['hora_salida']}</td>
                        <td>{$row['hora_llegada']}</td>
                        <td>{$row['tiempo_vuelta']}</td>
                        <td>{$row['velocidad']}</td>
                        <td>{$row['tiempo_acumulado']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No hay datos disponibles</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
