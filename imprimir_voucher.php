<?php
require __DIR__ . '/vendor/autoload.php'; // Cargar la biblioteca ESC/POS

function printVoucher() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "vouchers";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM vouchers_table ORDER BY voucher_time DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $name = $row["name"];
    $company = $row["company"];
    $time = $row["voucher_time"];
    $meal_type = $row["meal_type"];
    $voucher_number = sprintf("%03d", $row["id"]);
    $ip ="172.20.82.17";
    $port = 9100;
    $connector = new Mike42\Escpos\PrintConnectors\NetworkPrintConnector($ip,$port);
    $printer = new Mike42\Escpos\Printer($connector);

    $printer -> text("Ticket Colacion\n");
    $printer -> text("Nombre: " . $name . "\n");
    $printer -> text("Empresa: " . $company . "\n");
    $printer -> text("Fecha y Hora: " . $time . "\n");
    $printer -> text("Comida: " . $meal_type . "\n");
    $printer -> text("Número de Voucher: " .$voucher_number. "\n");
    $printer -> cut();
    $printer -> close();

    echo "Voucher impreso exitosamente.";
  } else {
    echo "No se encontró ningún voucher con ese ID.";
  }

  mysqli_close($conn);
}

printVoucher();
