<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Coches</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: url('../../images/background.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
        }
        footer {
            background-color: #343a40; /* Color de fondo oscuro */
            color: #fff; /* Color del texto blanco */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Circuito Oscar Crespo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro_inicial.php">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="coches.php">Coches</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-5">Lista de Coches Registrados</h1>

        <div class="mb-3">
            <a href="registro_inicial.php" class="btn btn-secondary">Ir Registro Inicial</a>
            <a href="agregar.php" class="btn btn-success">Agregar Coche</a>
            <button id="export-pdf" class="btn btn-danger">Exportar a PDF</button>
        </div>

        <table id="coches-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número</th>
                    <th>Nombre del Piloto</th>
                    <th>Nombre del Copiloto</th>
                    <th>Detalles del Coche</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli("localhost", "root", "", "circuito_oscar_crespo");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM coche";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['numero']; ?></td>
                            <td><?php echo $row['nombre_piloto']; ?></td>
                            <td><?php echo $row['nombre_copiloto']; ?></td>
                            <td><?php echo $row['detalles_coche']; ?></td>
                            <td>
                                <a href='editar.php?id=<?php echo $row['id']; ?>' class='btn btn-warning btn-sm'>Editar</a>
                                <a href='eliminar.php?id=<?php echo $row['id']; ?>' class='btn btn-danger btn-sm'>Eliminar</a>
                                <button class='btn btn-info btn-sm' onclick='mostrarFormulario(<?php echo $row['id']; ?>)'>Calcular Tiempo</button>
                                <div id='formulario-<?php echo $row['id']; ?>' class='calculo-formulario mt-2' style='display:none;'>
                                    <form onsubmit='calcularTiempo(event, <?php echo $row['id']; ?>)'>
                                        <div class='form-group'>
                                            <label for='distancia-<?php echo $row['id']; ?>'>Distancia (km)</label>
                                            <input type='number' class='form-control' id='distancia-<?php echo $row['id']; ?>' required>
                                        </div>
                                        <div class='form-group'>
                                            <label for='velocidad-<?php echo $row['id']; ?>'>Velocidad (km/h)</label>
                                            <input type='number' class='form-control' id='velocidad-<?php echo $row['id']; ?>' required>
                                        </div>
                                        <button type='submit' class='btn btn-primary btn-sm'>Calcular</button>
                                    </form>
                                    <div id='resultado-<?php echo $row['id']; ?>' class='mt-2'></div>
                                </div>
                                <button class='btn btn-info btn-sm' onclick='mostrarVueltas(<?php echo $row['id']; ?>)'>Ver Vueltas</button>
                                <div id='vueltas-<?php echo $row['id']; ?>' class='vueltas-tabla mt-2' style='display:none;'>
                                    <table class='table table-bordered'>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Coche ID</th>
                                                <th>Carrera ID</th>
                                                <th>Número de Vuelta</th>
                                                <th>Hora de Salida</th>
                                                <th>Hora de Llegada</th>
                                                <th>Tiempo de Vuelta</th>
                                                <th>Velocidad</th>
                                                <th>Tiempo Acumulado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $coche_id = $row['id'];
                                            $sql_vueltas = "SELECT * FROM vuelta WHERE coche_id = '$coche_id'";
                                            $result_vueltas = $conn->query($sql_vueltas);
                                            if ($result_vueltas->num_rows > 0) {
                                                while ($row_vuelta = $result_vueltas->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $row_vuelta['id']; ?></td>
                                                        <td><?php echo $row_vuelta['coche_id']; ?></td>
                                                        <td><?php echo $row_vuelta['carrera_id']; ?></td>
                                                        <td><?php echo $row_vuelta['numero_vuelta']; ?></td>
                                                        <td><?php echo $row_vuelta['hora_salida']; ?></td>
                                                        <td><?php echo $row_vuelta['hora_llegada']; ?></td>
                                                        <td><?php echo $row_vuelta['tiempo_vuelta']; ?></td>
                                                        <td><?php echo $row_vuelta['velocidad']; ?></td>
                                                        <td><?php echo $row_vuelta['tiempo_acumulado']; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan='9'>No hay vueltas registradas</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan='6'>No hay coches registrados</td>
                    </tr>
                <?php
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <footer class="bg-dark text-white text-center py-3">
        Trabajo realizado por: Zahira Torrico Rojas
    </footer>
    <script src="../../js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script>
        function mostrarFormulario(id) {
            var formulario = document.getElementById('formulario-' + id);
            if (formulario.style.display === 'none' || formulario.style.display === '') {
                formulario.style.display = 'block';
            } else {
                formulario.style.display = 'none';
            }
        }

        function actualizarTablaVueltas(id, tiempoVuelta, velocidad) {
            var tablaVueltas = document.getElementById('vueltas-' + id).querySelector('tbody');
            var filas = tablaVueltas.getElementsByTagName('tr');
            var ultimaFila = filas[filas.length - 1];
            var ultimaVuelta = parseInt(ultimaFila.cells[3].innerText);
            var tiempoAcumulado = ultimaFila.cells[8].innerText;

            var nuevaFila = document.createElement('tr');
            nuevaFila.innerHTML = `
                <td>${id}</td>
                <td>${id}</td>
                <td>${ultimaFila.cells[2].innerText}</td>
                <td>${ultimaVuelta + 1}</td>
                <td>${new Date().toLocaleTimeString()}</td>
                <td>${new Date().toLocaleTimeString()}</td>
                <td>${tiempoVuelta}</td>
                <td>${velocidad}</td>
                <td>${tiempoAcumulado}</td>
            `;
            tablaVueltas.appendChild(nuevaFila);
        }

        function calcularTiempo(event, id) {
            event.preventDefault();
            var distancia = document.getElementById('distancia-' + id).value;
            var velocidad = document.getElementById('velocidad-' + id).value;
            var tiempoVuelta = (distancia / velocidad).toFixed(2);

            var resultado = document.getElementById('resultado-' + id);
            resultado.innerHTML = `
                <p>Tiempo de Vuelta: ${tiempoVuelta} horas</p>
                <p>Velocidad: ${velocidad} km/h</p>
            `;

            actualizarTablaVueltas(id, tiempoVuelta, velocidad);
        }

        function mostrarVueltas(id) {
            var vueltasTabla = document.getElementById('vueltas-' + id);
            if (vueltasTabla.style.display === 'none' || vueltasTabla.style.display === '') {
                vueltasTabla.style.display = 'block';
            } else {
                vueltasTabla.style.display = 'none';
            }
        }

        document.getElementById('export-pdf').addEventListener('click', function() {
            html2canvas(document.getElementById('coches-table')).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                var doc = new jsPDF();
                doc.addImage(imgData, 'PNG', 10, 10);
                doc.save('coches.pdf');
            });
        });
    </script>
</body>
</html>
