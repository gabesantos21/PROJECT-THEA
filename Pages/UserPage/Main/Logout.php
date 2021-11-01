<?php
session_start();
if(isset($_GET['action'])){
    if($_GET['action'] == 'logout'){
     session_unset();
     session_destroy();
    }
  }
    header("Location: index.php?logout=success" );
?>