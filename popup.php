<!DOCTYPE html>
<html>
<head>
  <title>Voucher</title>
  <style>
    .voucher-popup {
      width: 400px;
      height: 500px;
      background-color: white;
      border: 1px solid gray;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 30px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
css
Copy code
.logo {
  width: 150px;
  height: 150px;
  background-image: url(logo.png);
  background-repeat: no-repeat;
  background-size: contain;
  margin-bottom: 30px;
}

p {
  margin: 0;
  padding: 10px 0;
}
  </style>
</head>
<body>
<?php
  if (mysqli_query($conn, $sql)) {
    $voucher_number = mysqli_insert_id($conn);
    $voucher_number = sprintf("%03d", $voucher_number);
    echo "<div class='voucher-popup' id='voucher'>";
    echo "<div class='logo'></div>";
    echo "<p>Número de Voucher: " . $voucher_number . "</p>";
    echo "<p>Nombre: " . $name . "</p>";
    echo "<p>Empresa: " . $company . "</p>";
    echo "<p>Fecha y Hora: " . $time . "</p>";
    echo "<p>Comida: " . $meal_type . "</p>";
    echo "</div>";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
  
  header("Refresh:0");

?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("voucher").style.display = "flex";
  });
</script>
</body>
</html>