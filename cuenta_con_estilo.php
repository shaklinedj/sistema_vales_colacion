<html>
<head>
  <style>
   .col-12{
    margin: 10px;

   }

   .form-control{
    width: 35% !important;
   }
    
  </style>
    <title>Contador de Vouchers</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
  <div class="container my-4">
    <h1 class="text-center">Contador de Vouchers</h1>
    <form method="post" class="row row-cols-lg-auto g-3 align-items-center">
      <div class="col-12">
        <label for="start_date" class="form-label">Fecha Inicio</label>
        <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo date('Y-m-01'); ?>">
      </div>
      <div class="col-12">
        <label for="end_date" class="form-label">Fecha Fin</label>
        <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
      </div>
      <div class="col-12">
        <label for="multiplier" class="form-label">Multiplicador</label>
        <input type="number" name="multiplier" id="multiplier" class="form-control" value="1">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button onclick="exportToCSV()" class="btn btn-primary">Exportar a CSV</button>

      </div>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vouchers";
    
        // Crear conexión
        $conn = mysqli_connect($servername, $username, $password, $dbname);
      
      
      ?>
      
      <div class="table-responsive mt-4">
        <?php
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
          <table class="table table-striped table-hover align-middle">
            <thead>
              <tr>
                <th>Empresa</th>
                <th>Comida</th>
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody>
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
            </tbody>
          </table>
        <?php
        } else {
          echo "<p class='alert alert-warning'>No se encontraron resultados</p>";
        }

        mysqli_close($conn);
        ?>
      </div>
    <?php } ?>
  </div>
  <script>
function exportToCSV() {
  // Obtener los datos de la base de datos
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'export.php');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Crear el archivo CSV
      var csv = xhr.responseText;
      var blob = new Blob([csv], {type: 'text/csv;charset=utf-8;'});
      var filename = 'vouchers.csv';
      if (navigator.msSaveBlob) { // IE 10+
        navigator.msSaveBlob(blob, filename);
      } else {
        var link = document.createElement('a');
        if (link.download !== undefined) { // feature detection
          // Browsers that support HTML5 download attribute
          var url = URL.createObjectURL(blob);
          link.setAttribute('href', url);
          link.setAttribute('download', filename);
          link.style.visibility = 'hidden';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
        }
      }
    }
  };
  xhr.send();
}
</script>


</body>

</html>