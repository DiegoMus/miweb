<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    
    $cuestion1 = $_POST['cuestion1'];
    $cuestion2 = $_POST['cuestion2'];
    $cuestion3 = $_POST['cuestion3'];
    $cuestion4 = $_POST['cuestion4'];
    $cuestion5 = $_POST['cuestion5'];
    $cuestion6 = $_POST['cuestion6'];
    $cuestion7 = $_POST['cuestion7'];
    $cuestion8 = $_POST['cuestion8'];
    $cuestion9 = $_POST['cuestion9'];
    $cuestion10 = $_POST['cuestion10'];
    // Connect to MySQL database
    $servername = "datacollect.mysql.database.azure.com";
    $username = "sysadmin"; // Your MySQL username
    $password = "Seguro##2020"; // Your MySQL password
    $dbname = "demolive"; // Your database name
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert survey response into database
    $sql = "INSERT INTO survey (cuestion1, cuestion2, cuestion3, cuestion4, cuestion5, cuestion6, cuestion7, cuestion8, cuestion9, cuestion10) 
    VALUES 
    ('$cuestion1', '$cuestion2', '$cuestion3', '$cuestion4', '$cuestion5','$cuestion6', '$cuestion7', '$cuestion8', '$cuestion9', '$cuestion10' )";
    if ($conn->query($sql) === TRUE) {
        //echo "Survey submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
header("Location: form.html", true);
exit();
?>
