<?php
$servername = "localhost";
$usename = "root";
$pasword = "4381491.Fv";
$db = "database_project";

 
try {
      $conn = new PDO(
        "mysql:host=$servername;dbname=database_project",
        $usename, $pasword);
   
      // Set the PDO error mode
      // to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE,
                  PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
      echo "Connection failed: "
        . $e->getMessage();
}


?>