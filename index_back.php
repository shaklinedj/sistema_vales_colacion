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
      <input type="submit" value="Generar">
    </form>
    <div id="voucher">
      <?php
      date_default_timezone_set("America/Santiago");
      
        if (isset($_POST["name"])) {
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
          $time = date("Y-m-d H:i:s");
          $meal_type = "Almuerzo";
          if (date("H") >= 18) {
            $meal_type = "Cena";
          }

          $sql = "INSERT INTO vouchers_table (name, voucher_time, meal_type)
          VALUES ('$name', '$time', '$meal_type')";

          if (mysqli_query($conn, $sql)) {
              echo "<p>Nombre: " . $name . "</p>";
              echo "<p>Fecha y Hora: " . $time . "</p>";
              echo "<p>Comida: " . $meal_type . "</p>";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }

          mysqli_close($conn);

          header("Refresh:30");
        }
      ?>
    </div>
  </body>
</html>
