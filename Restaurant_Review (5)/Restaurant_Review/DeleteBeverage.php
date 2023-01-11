<?php
include "databasequery.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM Beverages WHERE BeverageId =$id";
    $conn->query($sql);
    $log = $conn->prepare('INSERT INTO logs (Message) VALUES (?)');
    $log->execute([
      
      'DELETE FROM Beverages WHERE BeverageId =$id',
  
  
    ]);


    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>