<!DOCTYPE html>
<html>
<head>
    <title>Historial de Registros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <style>
         .table-bordered {
            border: 2px solid black;
        }

        .mt-5 {
            margin-top: 3rem;
        }

        .mt-4 {
            margin-top: 2rem;
        }

        .container {
            margin-bottom: 2rem;
        }
    </style>
    <div class="container">

        <h1 class="mt-5">Historial de Registros del llenado de botellones</h1>

        <div class="table-responsive" style="max-height: 500px;">
            <table class="table table-bordered mt-4">
                <thead class="thead-dark sticky-top">
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Cantidad de Botellas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Datos de conexión a la base de datos
                    $servername = "localhost";
                    $username = "id21364599_ejercicios";
                    $password = "Mayodia03.";
                    $dbname = "id21364599_ejercicios";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Error de conexión a la base de datos: " . $conn->connect_error);
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['llenarBotellon'])) {
                        if (!isset($_SESSION['formulario_enviado'])) {
                            $_SESSION['formulario_enviado'] = true;

                            date_default_timezone_set('America/Caracas');
                            $fecha = date('Y-m-d');
                            $hora = date('H:i:s');
                            $cantidadBotellas = $_POST['cantidadBotellas'];
                            $cantidadBotellas = intval($cantidadBotellas);
                            $cantidadBotellas = $conn->real_escape_string($cantidadBotellas);

                            $insertSql = "INSERT INTO botellones (fecha_llenado, hora_llenado, cantidad) VALUES ('$fecha', '$hora', $cantidadBotellas)";
                           if ($conn->query($insertSql) === TRUE) {
                                echo "<script>";
                                echo "window.location.href = '" . $_SERVER['PHP_SELF'] . "';";
                                echo "</script>";
                                exit;
                            } else {
                                echo "Error al llenar el botellón: " . $conn->error;
                            }
                        }
                    }
                    $sql = "SELECT fecha_llenado, hora_llenado, cantidad FROM botellones";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['fecha_llenado'] . "</td>";
                            echo "<td>" . $row['hora_llenado'] . "</td>";
                            echo "<td>" . $row['cantidad'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No hay registros en el historial</td></tr>";
                    }
                    
                    ?>
                </tbody>
            </table>
        </div>

        <form method="post">
            <div class="form-group">
                <label for="cantidadBotellas">Cantidad de Botellas:</label>
                <input type="number" class="form-control" id="cantidadBotellas" name="cantidadBotellas" >
            </div>
            <button type="submit" name="llenarBotellon" class="btn btn-primary">Llenar Botellón</button>
            <button type="submit" id = "generarPDF" name="generarPDF" formtarget="_blank" formaction="generar_pdf.php" class="btn btn-primary">Generar Reporte PDF</button>
            
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
 <script>
    $(document).ready(function() {
  $('#generarPDF').click(function() {
    $.ajax({
      url: 'generar_pdf.php', 
      type: 'GET',
      success: function(response) {
        alert('Reporte generado correctamente');
      },
      error: function(xhr, status, error) {
        alert('Error al generar el PDF: ' + error);
      }
    });
  });
});
 </script>
</html>