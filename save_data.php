<?php
// Database connection
$servername = "datacollect.mysql.database.azure.com";
$username = "sysadmin"; // Your MySQL username
$password = "Seguro##2020"; // Your MySQL password
$dbname = "demolive"; // Your database name
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$cui = $_POST['cui'];
$doc = $_POST['doc'];
$sex = $_POST['sex'];
$ethnian = $_POST['ethnian'];
$placa = $_POST['placa'];
$puesto = $_POST['puesto'];
$objeto = $_POST['objeto'];
$observa = $_POST['observa'];
    // Insert data into the database
$sql = "INSERT INTO personas (nombres, CUI, documentos, SexoID, EtniaID) VALUES ('$name', '$cui', '$doc', '$sex', '$ethnian' )";
if ($conn->query($sql) === TRUE) {
  $last_personID = $conn->insert_id;  
  ##echo "Persona Guardada" . $last_personID . $name;
  $sql2 = "INSERT INTO vehiculos (placa, PersonaID) VALUES ('$placa', '$last_personID' )";
  
  if ($conn->query($sql2) === TRUE) {
    $last_vehiID = $conn->insert_id;
    $date =  date("Y-m-d h:i:s");
    ##echo "Vehiculo Guardada";
    
    $sql3 = "INSERT INTO registro (PuestoID, VehiculoID, ObjetoID, FechaRegistro, Observaciones ) VALUES ('$puesto', '$last_vehiID', '$objeto', '$date','$observa' )";
    if ($conn->query($sql3) === TRUE) {
        ##echo "Registro Guardado"; 
        
    }else{
        echo "Error: " . $sql3 . "<br>" . $conn->error;
    }
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}




// Close database connection
$conn->close();
header("Location: form.html", true);
exit();

?>


