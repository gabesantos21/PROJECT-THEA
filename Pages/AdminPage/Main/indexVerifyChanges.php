<?php
session_start();

include '../../../Sql/dbConnection.php'; 

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {

    if(isset($_GET["action"])){
      
        if($_GET['action']=="edit"){
          // Code for updating latest page info
          header("Location: index.php?status=success" );
        }
      }
    // else
    // header("Location: index.php?status=error" );

}
?>