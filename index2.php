<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Generador de Voucher</title>
  </head>
  <body>
    <h1>Generador de Voucher</h1>
    <form action="" method="post">
      <label for="name">Nombre:</label>
      <input type="text" id="name" name="name" required>
      <label for="company">Empresa:</label>
      <select id="company" name="company">
        <option value="Casino">Casino</option>
        <option value="Hotel">Hotel</option>
        <option value="Grupo Clean">Grupo Clean</option>
        <option value="Externo">Externo</option>
      </select>
      <input type="submit" value="Generar">
    </form>
    <div id="voucher">
      <?php
        date_default_timezone_set("America/Santiago");
        if (isset($_POST["name"]) && isset($_POST["company"])) {
          // Conexión a la base de datos
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "vouchers";

          $conn = mysqli_connect($servername, $username, $password, $dbname);
          
          if (!$conn) {
              die("Conexión fallida: " . mysqli_connect_error());
          }

          $name = $_POST["name"];
          $company = $_POST["company"];
          $time = date("Y-m-d H:i:s");
          $meal_type = "Almuerzo";
          if (date("H") >= 18) {
            $meal_type = "Cena";
          }

          $sql = "INSERT INTO vouchers_table (name, company, voucher_time, meal_type)
          VALUES ('$name', '$company', '$time', '$meal_type')";

          if (mysqli_query($conn, $sql)) {
              echo "<p>Nombre: " . $name . "</p>";
              echo "<p>Empresa: " . $company . "</p>";
              echo "<p>Fecha y Hora: " . $time . "</p>";
              echo "<p>Comida: " . $meal_type . "</p>";
              $voucher_id = mysqli_insert_id($conn);
              echo "<p>ID Voucher: " . str_pad($voucher_id, 3, "0", STR_PAD_LEFT) . "</p>";
              echo "<button onclick='printVoucher(" . $voucher_id . ")'>Imprimir</button>";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }

          mysqli_close($conn);

          header("Refresh:30");
        }



        ?>

<script>
  function printVoucher() {
    window.print();
  }
</script>
</body>
</html>
