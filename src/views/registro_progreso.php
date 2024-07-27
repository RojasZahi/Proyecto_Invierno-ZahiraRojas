<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Progreso</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Registro de Progreso</h1>
    <form action="../controllers/RegistroProgresoController.php" method="post">
        <div class="form-group">
            <label for="numero">Número de Coche</label>
            <input type="number" class="form-control" id="numero" name="numero" required>
        </div>
        <div class="form-group">
            <label for="numero_vuelta">Número de Vuelta</label>
            <input type="number" class="form-control" id="numero_vuelta" name="numero_vuelta" required>
        </div>
        <div class="form-group">
            <label for="hora_llegada">Hora de Llegada</label>
            <input type="time" class="form-control" id="hora_llegada" name="hora_llegada" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
<script src="../../js/scripts.js"></script>
</body>
</html>
