<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Generador de Voucher</title>
    <style>
         /* Estilos generales */
         body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
      }
      h1 {
        text-align: center;
        margin-top: 50px;
      }
      form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
      }
      label {
        margin-top: 20px;
      }
      input[type="text"], select {
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-left: 10px;
        width: 200px;
      }
      input[type="submit"] {
        background-color: #008CBA;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #005E80;
      }
/* Popup */
.popup {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.popup-content {
  background-color: #fefefe;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 600px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}



     
    </style>
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

    <!-- Popup -->
    <div id="popup" class="popup" onclick='printVoucher(" . $voucher_id . ")'>
      <div class="popup-content" >
        <span class="close">&times;</span>
        <h2>Ticket Colacion</h2>
        <p><img src="logo.png" alt="Logo" width="100"></p>
        <p>Nombre: <span id="popup-name"></span></p>
        <p>Empresa: <span id="popup-company"></span></p>
        <p>Fecha y Hora: <span id="popup-time"></span></p>
        <p>Comida: <span id="popup-meal"></span></p>
        <p>N° de Voucher: <span id="popup-number"></span></p>
      

      </div>
    </div>

    <!-- Código JavaScript para abrir y cerrar el popup -->
    <script>
      // Obtener elementos
      var popup = document.getElementById("popup");
      var btn = document.getElementById("generate");
      var span = document.getElementsByClassName("close")[0];

      // Abrir el popup
      function openPopup(




) {
popup.style.display = "block";
document.getElementById("popup-name").innerHTML = name;
document.getElementById("popup-company").innerHTML = company;
document.getElementById("popup-time").innerHTML = time;
document.getElementById("popup-meal").innerHTML = meal;
document.getElementById("popup-number").innerHTML = number;
}
// Cerrar el popup al hacer clic en el botón "X"
  span.onclick = function() {
    popup.style.display = "none";
  }

  // Cerrar el popup al hacer clic fuera de él
  window.onclick = function(event) {
    if (event.target == popup) {
      popup.style.display = "none";
    }
  }
</script>

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
    if (date("H")>= 18 && date("H")<= 8) {
      $meal_type = "Cena";
    }

    $sql = "INSERT INTO vouchers_table (name, company, voucher_time, meal_type)
    VALUES ('$name', '$company', '$time', '$meal_type')";

    if (mysqli_query($conn, $sql)) {
        header("Refresh:5");
        echo "<p>Nombre: " . $name . "</p>";
        echo "<p>Empresa: " . $company . "</p>";
        echo "<p>Fecha y Hora: " . $time . "</p>";
        echo "<p>Comida: " . $meal_type . "</p>";
        $voucher_id = mysqli_insert_id($conn);
        echo "<p>ID Voucher: " . str_pad($voucher_id, 3, "0", STR_PAD_LEFT) . "</p>";
       // echo "<button onclick='printVoucher(" . $voucher_id . ")'>Imprimir</button>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

   

    // Abrir el popup con los datos del voucher
    echo '<script>var name = "'.$name.'";
     var company = "'.$company.'"; 
     var time = "'.$time.'"; 
    var meal = "'.$meal_type.'"; 
    var number = "'.$voucher_id.'"; 
    openPopup();</script>';
  }
?>

<script>
  function printVoucher() {
    window.print();
  }
</script>
  </body>
</html>