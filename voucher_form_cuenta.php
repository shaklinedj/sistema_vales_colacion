<html>
  <head>
    <title>Contador de Vouchers</title>
  </head>
  <body>
  <form method="post">
  Fecha Inicio: <input type="date" name="start_date" value="<?php echo date('Y-m-01'); ?>">
  Fecha Fin: <input type="date" name="end_date" value="<?php echo date('Y-m-d'); ?>">
  Multiplicador: <input type="number" name="multiplier" value="1">
  <input type="submit" value="Enviar">
</form> 

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vouchers";

    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);
  
    // Verificar conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $multiplier = $_POST["multiplier"];
    $sql = "SELECT company, meal_type, count(meal_type) as count
    FROM vouchers_table
    WHERE voucher_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'
    GROUP BY company, meal_type";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
?>
<table>
  <tr>
    <th>Empresa</th>
    <th>Comida</th>
    <th>Cantidad</th>
  </tr>
  <?php
    $total = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["company"] . "</td>";
      echo "<td>" . $row["meal_type"] . "</td>";
      echo "<td>" . $row["count"] * $multiplier . "</td>";
      echo "</tr>";
      $total += $row["count"] * $multiplier;
    }
    echo "<tr>";
    echo "<td colspan='2'><b>Total</b></td>";
    echo "<td><b>" . $total . "</b></td>";
    echo "</tr>";
  ?>
</table>
<?php
    } else {
        echo "No se encontraron resultados";
    }

    mysqli_close($conn);
  }
?>
  </body>
</html>