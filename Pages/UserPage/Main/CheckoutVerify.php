<?php
session_start();

include '../../../Sql/dbConnection.php'; 

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {

    if(isset($_GET["action"])){
      
        if($_GET['action']=="checkout"){
          // Code for checkout
          header("Location: index.php?action=checkout" );
        }
      }
    // else
    // header("Location: index.php?status=error" );

}
?>