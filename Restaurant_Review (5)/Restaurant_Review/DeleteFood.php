<?php
include "databasequery.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM foods WHERE FoodId =$id";
    $conn->query($sql);
    $log = $conn->prepare('INSERT INTO logs (Message) VALUES (?)');
    $log->execute([
      
      'DELETE FROM foods WHERE FoodId =$id',
  
  
    ]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>