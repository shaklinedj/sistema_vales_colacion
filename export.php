<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vouchers";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los datos de la base de datos
$sql = "SELECT * FROM vouchers_table";
$result = mysqli_query($conn, $sql);

// Crear el archivo CSV
$output = fopen('php://output', 'w');
$header = array('ID', 'Nombre', 'Comida', 'Fecha', 'Empresa');
fputcsv($output, $header);
while ($row = mysqli_fetch_assoc($result)) {
  fputcsv($output, $row);
}
fclose($output);

mysqli_close($conn);
?>
