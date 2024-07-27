<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Coche</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Agregar Coche</h1>
    <form action="agregar_procesar.php" method="post">
        <div class="form-group">
            <label for="numero">Número del Coche</label>
            <input type="number" class="form-control" id="numero" name="numero" required>
        </div>
        <div class="form-group">
            <label for="nombre_piloto">Nombre del Piloto</label>
            <input type="text" class="form-control" id="nombre_piloto" name="nombre_piloto" required>
        </div>
        <div class="form-group">
            <label for="nombre_copiloto">Nombre del Copiloto</label>
            <input type="text" class="form-control" id="nombre_copiloto" name="nombre_copiloto" required>
        </div>
        <div class="form-group">
            <label for="detalles_coche">Detalles del Coche</label>
            <input type="text" class="form-control" id="detalles_coche" name="detalles_coche" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <a href="coches.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
