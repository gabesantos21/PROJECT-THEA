<?php
session_start();
if(!isset($_SESSION['userName'])){
    header("Location: ../../UserPage/Main/index.php" );
}else if(isset($_SESSION['isAdmin']) && !$_SESSION['isAdmin']){
  header("Location: ../../UserPage/Main/index.php" );
}
if(isset($_GET['action'])){
    if($_GET['action'] == 'logout'){
     session_unset();
     session_destroy();
    }
  }
    header("Location: ../../UserPage/Main/index.php?logout=success" );
?>