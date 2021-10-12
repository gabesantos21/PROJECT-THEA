<?php
session_start();

include '../../../Sql/dbConnection.php'; 

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {

    if(isset($_GET["action"])){
      if($_GET['action']=="delete"){
        // Code for deleting product in db;
        header("Location: store.php?delete=success");
      }
      else if($_GET['action']=="edit"){
        // Code for updating latest product info
        header("Location: store.php?edit=success");
      }
      else if($_GET['action']=="add"){
        // Code for adding product on db
        header("Location: store.php?add=success");
      }
    }
}
?>