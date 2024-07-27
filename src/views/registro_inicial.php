<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro Inicial</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Registro Inicial</h1>
    <form action="../controllers/RegistroInicialController.php" method="post">
        <div class="form-group">
            <label for="numero_vueltas">Número Total de Vueltas</label>
            <input type="number" class="form-control" id="numero_vueltas" name="numero_vueltas" required>
        </div>
        <div class="form-group">
            <label for="numero">Número de Coche</label>
            <input type="number" class="form-control" id="numero" name="numero" required>
        </div>
        <div class="form-group">
            <label for="nombre_piloto">Nombre del Piloto</label>
            <input type="text" class="form-control" id="nombre_piloto" name="nombre_piloto" required>
        </div>
        <div class="form-group">
            <label for="nombre_copiloto">Nombre del Copiloto</label>
            <input type="text" class="form-control" id="nombre_copiloto" name="nombre_copiloto">
        </div>
        <div class="form-group">
            <label for="detalles_coche">Detalles del Coche</label>
            <textarea class="form-control" id="detalles_coche" name="detalles_coche"></textarea>
        </div>
        <div class="form-group">
            <label for="hora_salida">Hora de Salida</label>
            <input type="time" class="form-control" id="hora_salida" name="hora_salida" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="coches.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script src="../../js/scripts.js"></script>
</body>
</html>
