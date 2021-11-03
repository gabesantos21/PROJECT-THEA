<?php
session_start();
include '../../../Sql/dbConnection.php'; 

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {

    if(isset($_GET["action"])){
      
      if($_GET['action']=="checkout"){
        // Code for checkout - add to db
        $uname = $_SESSION['userName'];
        $userFname = $_POST['given-Name'];
        $userLname = $_POST['surname'];
        $userAddress = $_POST['address'];
        $userCity = $_POST['city'];
        $userBarangay = $_POST['barangay'];
        $userZip = $_POST['zip'];
        $userNumber = $_POST['phone-Number'];
        $tprice = $_POST['tprice'];
        $orderid = uniqid('hbn');
        
        $userid = $_SESSION['userId'];

        $fAddress = $userAddress . ', ' . $userCity . ', ' . $userBarangay . ', ' . $userZip; 

        
        

        if($_GET["action"] == 'checkout'){
          $status = 'Pending';
          $userSql = "UPDATE user_account SET f_name = ? , l_name = ? , phone_number = ?,
          address = ? , city = ? , barangay = ? , zip = ? 
          WHERE user_name = ? ;";
          $stmt = $conn->prepare($userSql);
          $stmt->bind_param("ssssssss", $userFname, $userLname, $userNumber, 
          $userAddress, $userCity, $userBarangay, $userZip, $uname);
          $stmt->execute();

          $sql = "INSERT INTO orders(order_id, user_id, order_date, status, f_address, total_price) 
          VALUES (?, ?, NOW(), ?, ?, ?);";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("sissi", $orderid, $userid, $status, $fAddress, $tprice);
          $stmt->execute();

         

          
          $sql1 = "INSERT INTO order_items(order_id, product_id, quantity) 
            VALUES (?, ?, ?);";
          
          
          foreach ($_SESSION["shopping_cart"] as $values){
            $sql = "SELECT * from product_list where name = '" . $values['item_name'] ."';";
            $result = $conn->query($sql);
            $quantity = $values['item_quantity'];
            
            if($row = $result->fetch_assoc()){
              $productid = $row['id'];
            }
            $stmt2 = $conn->prepare($sql1);
            $stmt2->bind_param("sii", $orderid, $productid, $quantity);
            $stmt2->execute();
            
            
            
          }
          
          header("Location: index.php?action=checkout" );
        }
        }
      }
    // else (if necessary)
    // header("Location: index.php?status=error" );

}
?>