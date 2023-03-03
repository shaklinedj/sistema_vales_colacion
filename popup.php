<!DOCTYPE html>
<html>
<head>
  <title>Voucher</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      line-height: 1.5;
      padding: 20px;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    p {
      margin-bottom: 10px;
    }

    button {
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vouchers";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Conexión fallida: " . mysqli_connect_error());
    }

    // Obtener el último voucher generado
    $sql = "SELECT * FROM vouchers_table ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      echo "<h1> Ticket Colacion </h1>";
      echo "<p>Nombre: " . $row["name"] . "</p>";
      echo "<p>Empresa: " . $row["company"] . "</p>";
      echo "<p>Fecha y Hora: " . $row["voucher_time"] . "</p>";
      echo "<p>Comida: " . $row["meal_type"] . "</p>";
      echo "<p>Número de Voucher: " . sprintf("%03d", $row["id"]) . "</p>";
    } else {
      echo "<p>No se encontraron vouchers.</p>";
    }

    mysqli_close($conn);
  ?>

  <button onclick="window.print()">Imprimir</button>
</body>
</html>
