<?php
session_start();

include '../../../Sql/dbConnection.php'; 

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {

    if(isset($_GET["action"])){
      
        if($_GET['action']=="edit"){
          // Code for updating latest page info
          $folderBackground = "../../../Assets/img/backgrounds/";
          $folderLogo = "../../../Assets/img/logo/";
          $folderProduct = "../../../Assets/img/products/";
          $img1 = "";
          $img2 = "";
          $img3 = "";
          $img4 = "";
          if(isset($_FILES["productFile1"]["name"])){
            $img1 = basename($_FILES["productFile1"]["name"]);
            $target_file1 = $folderProduct . $img1;
            $upload1 = move_uploaded_file($_FILES["productFile1"]["tmp_name"], $target_file1);
            echo $img2;
          }
          if(isset($_FILES["productFile2"]["name"])){
            $img2 = basename($_FILES["productFile2"]["name"]);
            $target_file2 = $folderProduct . $img2;
            $upload2 = move_uploaded_file($_FILES["productFile2"]["tmp_name"], $target_file2);
          }
          if(isset($_FILES["productFile3"]["name"])){
            $img3 = basename($_FILES["productFile3"]["name"]);
            $target_file3 = $folderProduct . $img3;
            $upload3 = move_uploaded_file($_FILES["productFile3"]["tmp_name"], $target_file3);
          }
          if(isset($_FILES["productFile4"]["name"])){
            $img4 = basename($_FILES["productFile4"]["name"]);
            $target_file4 = $folderLogo . $img4;
            $upload4 = move_uploaded_file($_FILES["productFile4"]["tmp_name"], $target_file4);
          }
          
          
          
         
          
          
            
            $valuesArr = array(
                "carouselimg1" => basename($_FILES["productFile1"]["name"]),
                "carouseltag1" => $_POST['slider1Header'],
                "carouselproduct1" => $_POST['slider1Text'],
                "carouselbutton1" => $_POST['btnStore'],
                "carouselimg2" => basename($_FILES["productFile2"]["name"]),
                "carouseltag2" => $_POST['slider2Header'],
                "carouselproduct2" => $_POST['slider2Text'],
                "carouselimg3" => basename($_FILES["productFile3"]["name"]),
                "carouseltag3" => $_POST['slider3Header'],
                "carouselproduct3" => $_POST['slider3Text'],
                "category1" => $_POST['categAbout'],
                "category1img" => $img4 = basename($_FILES["productFile4"]["name"]),
                "category1tag" => $_POST['headerAbout'],
                "category1txt" => $_POST['message'],
                "category2" => $_POST['categContact'],
                "category2txt1" => $_POST['contactTxt1'],
                "category2txt2" => $_POST['contactTxt2'],
                "category2txt3" => $_POST['contactTxt3'],
                "category2input1" => $_POST['input1'],
                "category2input2" => $_POST['input2'],
                "category2input3" => $_POST['input3']
            );
            
            
          
            $sql = "UPDATE index_text 
                    SET text = ? WHERE name = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $value, $key);
            
            foreach ($valuesArr as $k => $v){
                if(!is_null($valuesArr[$k]) && $valuesArr[$k] != ""){
                  $value = $v;
                  $key = $k;
                  $stmt->execute();
                }
            }
            

          header("Location: index.php?status=success" );
        }
    }
    // else
    // header("Location: index.php?status=error" );

}
?>