<?php
session_start();

include '../../../Sql/dbConnection.php'; 

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
    if(isset($_POST['statuschange'])){
        if(isset($_POST['status'])){
            $status = $_POST['status'];
            $statusArr = explode (",", $status);
            
            

            $sql = "UPDATE orders SET status = ?
            WHERE order_id = ? ;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $statusArr[0], $statusArr[1]);
            $stmt->execute();
            header("Location: OrderStatusPage.php?update=success");
        }else{
            header("Location: OrderStatusPage.php?update=fail");
        }
    }
}

?>