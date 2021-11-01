<?php
session_start();

include '../../../Sql/dbConnection.php'; 

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
 
 
    

    if(isset($_GET["action"])){
      if($_GET['action']=="delete"){
        // Code for deleting product in db;
          $key = $_POST["id"];
          $sql="DELETE FROM product_list WHERE id = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $key);
          $stmt->execute();

        header("Location: store.php?delete=success");
      }
      else if($_GET['action']=="edit"){
        // Code for updating latest product info
          

          $key = $_POST["id"];
           $productName = $_POST["name"];
          $productPrice = $_POST["price"];
          $productDescription = $_POST["description"];
          $folderProduct = "../../../Assets/img/products/";
          $img = "";
          if(isset($_FILES["image"]["name"])){
            $img = basename($_FILES["image"]["name"]);
            $target_file = $folderProduct . $img;
            $upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
          }
          
          if(empty($key) || empty($productName) || empty($productPrice) || empty($productDescription) || empty($img)){
            header("Location: store.php?edit=fail");

          }
          else{
          $sql = "UPDATE product_list SET name = ?, price = ?, description = ?, image = ? WHERE id = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("sissi", $productName, $productPrice, $productDescription, $img, $key);
          $stmt->execute();
          
          header("Location: store.php?edit=success");
          }
      }
      else if($_GET['action']=="add"){
        // Code for adding product on db
          $productName = $_POST["name"];
          $productPrice = $_POST["price"];
          $productDescription = $_POST["description"];
          $folderProduct = "../../../Assets/img/products/";
          $img = "";
          if(isset($_FILES["image"]["name"])){
            $img = basename($_FILES["image"]["name"]);
            $target_file = $folderProduct . $img;
            $upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
          }
          $sql="INSERT INTO product_list (name, price, description, image)
          VALUES (?, ?, ?, ?)";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("siss", $productName, $productPrice, $productDescription, $img);
          $stmt->execute();


        header("Location: store.php?add=success");
      }
    }
}
?>