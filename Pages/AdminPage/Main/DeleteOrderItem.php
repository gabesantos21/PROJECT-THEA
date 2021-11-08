<?php
session_start();
if(!isset($_SESSION['userName'])){
    header("Location: ../../UserPage/Main/index.php" );
}else if(isset($_SESSION['isAdmin']) && !$_SESSION['isAdmin']){
  header("Location: ../../UserPage/Main/index.php" );
}

include '../../../Sql/dbConnection.php'; 

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
    if(isset($_GET['productid']) && isset($_GET['orderid'])){
        
            $product = $_GET['productid'];
            $order = $_GET['orderid'];
            $sql = "DELETE FROM order_items
            WHERE product_id = ? AND order_id = ? ;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $product, $order);
            $stmt->execute();
            header("Location: OrderStatusPage.php?delete=success");
        
    }else{
        header("Location: OrderStatusPage.php?delete=fail");
    }
}

?>