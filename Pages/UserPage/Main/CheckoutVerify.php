<?php
session_start();

include '../../../Sql/dbConnection.php'; 

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {

    if(isset($_GET["action"])){
      
        if($_GET['action']=="checkout"){
          // Code for checkout - add to db
          header("Location: index.php?action=checkout" );
        }
      }
    // else (if necessary)
    // header("Location: index.php?status=error" );

}
?>