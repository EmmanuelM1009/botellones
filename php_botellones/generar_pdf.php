<?php
require('vendor/autoload.php'); // Requerir la biblioteca TCPDF

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "id21364599_ejercicios";
$password = "Mayodia03.";
$dbname = "id21364599_ejercicios";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los registros del historial
$sql = "SELECT fecha_llenado, hora_llenado, cantidad FROM botellones";
$result = $conn->query($sql);

// Crear un nuevo objeto TCPDF
$pdf = new TCPDF();

// Establecer el formato del papel y la orientación
$pdf->SetMargins(10,2,10);


// Agregar una página
$pdf->AddPage();

// Establecer la fuente y tamaño del título
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de botellones', 0, 1, 'C');

// Establecer la fuente y tamaño del encabezado de la tabla
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(40, 10, 'Fecha', 1, 0, 'C');
$pdf->Cell(40, 10, 'Hora', 1, 0, 'C');
$pdf->Cell(50, 10, 'Cantidad de Botellas', 1, 1, 'C');

// Establecer la fuente y tamaño del contenido de la tabla
$pdf->SetFont('helvetica', '', 12);
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(40, 10, $row['fecha_llenado'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['hora_llenado'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['cantidad'], 1, 1, 'C');
}

// Establecer el ancho de las celdas de la tabla
$tbl_width = $pdf->getPageWidth() - $pdf->getMargins()['left'] - $pdf->getMargins()['right'];


// Volver al inicio del conjunto de resultados
$result->data_seek(0);



// Guardar el PDF en el servidor
$pdf->Output('historial_registros.pdf', 'D');