<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Coche</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Editar Coche</h1>
    <?php
    $conn = new mysqli("localhost", "root", "", "circuito_oscar_crespo");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM coche WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el coche.";
        exit();
    }
    $conn->close();
    ?>
    <form action="../controllers/EditarCocheController.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="numero">Número de Coche</label>
            <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $row['numero']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nombre_piloto">Nombre del Piloto</label>
            <input type="text" class="form-control" id="nombre_piloto" name="nombre_piloto" value="<?php echo $row['nombre_piloto']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nombre_copiloto">Nombre del Copiloto</label>
            <input type="text" class="form-control" id="nombre_copiloto" name="nombre_copiloto" value="<?php echo $row['nombre_copiloto']; ?>">
        </div>
        <div class="form-group">
            <label for="detalles_coche">Detalles del Coche</label>
            <textarea class="form-control" id="detalles_coche" name="detalles_coche"><?php echo $row['detalles_coche']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
<script src="../../js/scripts.js"></script>
</body>
</html>
