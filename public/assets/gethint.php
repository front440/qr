<?php
$con = mysqli_connect('localhost', 'root', '', 'qr2');

// Comprobar la conexión
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Obtener el parámetro "q" de la URL
$q = $_REQUEST["q"];

if ($q != "") {
  // Parsear los valores del código QR
  $qrValues = array();
  $qrPairs = explode('|', $q); // Separar los pares clave-valor por el símbolo '|'
  foreach ($qrPairs as $pair) {
    list($key, $value) = explode('=', $pair); // Separar la clave y el valor
    $qrValues[$key] = $value; // Asignar los valores al array $qrValues
  }

  $id = $qrValues["id"];

  // Verificar si la clave "type" está definida en $qrValues
  if (isset($qrValues["type"]) && is_numeric($qrValues["type"])) {
    $type = intval($qrValues["type"]); // Convertir el valor a entero
  } else {
    $type = 0; // Asignar un valor predeterminado si la clave no está definida o no es un número válido
  }

  // Escapar los valores para evitar inyección de SQL
  $id = mysqli_real_escape_string($con, $id);

  // Verificar si ya existe un registro con el mismo id y dentro del intervalo de tiempo especificado (1 minuto)
  $interval = date('Y-m-d H:i:s', strtotime('-1 minute'));
  $query = "SELECT COUNT(*) AS count FROM users_logs WHERE id_user = '$id' AND date >= '$interval'";
  $result = mysqli_query($con, $query);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count == 0) {
      // No existe un registro duplicado dentro del intervalo de tiempo, realizar la inserción
      $insertQuery = "INSERT INTO users_logs (id_user, date, type) VALUES ('$id', NOW(), $type)";
      $insertResult = mysqli_query($con, $insertQuery);

      if ($insertResult) {
        echo '<div class="alert alert-success"><strong>Exito!</strong> Registro guardado correctamente</div>';
        echo date('l jS \of F Y h:i:s A');
      } else {
        echo '<div class="alert alert-danger"><strong>Error!</strong> Error al guardar registro</div>';
      }
    } else {
      echo '<div class="alert alert-warning"><strong>Alerta!</strong> Registro ya guardado correctamente</div>';
    }
  } else {
    echo '<div class="alert alert-danger"><strong>Error!</strong> Error al comprobar datos duplicados</div>';
  }
} else {
  echo '<div class="alert alert-warning"><strong>Alerta!</strong> Parámetro QR vacío</div>';
}

mysqli_close($con);
?>
