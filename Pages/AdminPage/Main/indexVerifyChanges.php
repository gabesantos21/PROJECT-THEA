<?php
session_start();

include '../../../Sql/dbConnection.php'; 

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {

    if(isset($_GET["action"])){
      
        if($_GET['action']=="edit"){
          // Code for updating latest page info
         
          
            
            $valuesArr = array(
                "carouselimg1" => $_FILES["productFile1"]["name"],
                "carouseltag1" => $_POST['slider1Header'],
                "carouselproduct1" => $_POST['slider1Text'],
                "carouselbutton1" => $_POST['btnStore'],
                "carouselimg2" => $_FILES["productFile2"]["name"],
                "carouseltag2" => $_POST['slider2Header'],
                "carouselproduct2" => $_POST['slider2Text'],
                "carouselimg3" => $_FILES["productFile3"]["name"],
                "carouseltag3" => $_POST['slider3Header'],
                "carouselproduct3" => $_POST['slider3Text'],
                "category1" => $_POST['categAbout'],
                "category1img" => $_FILES["productFile4"]["name"],
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
            
            echo $_FILES["productFile1"]["name"];

            // File
            
            @$tempname1 = $_FILES["productFile1"]["tmp_name"];
            @$tempname2 = $_FILES["productFile2"]["tmp_name"];
            @$tempname3 = $_FILES["productFile3"]["tmp_name"];
            @$tempname4 = $_FILES["productFile4"]["tmp_name"];
            $folderBackground = "../../../Assets/img/backgrounds/";
            $folderLogo = "../../../Assets/img/logo/";
            $folderProduct = "../../../Assets/img/products/";

            if(isset($tempname1)){
                $file1 = move_uploaded_file($tempname1, $folderProduct);
            }
            if(isset($tempname2)){
                $file2 = move_uploaded_file($tempname2, $folderProduct);
            }
            if(isset($tempname3)){
                $file3 = move_uploaded_file($tempname3, $folderProduct);
            }
            if(isset($tempname4)){
                $file4 = move_uploaded_file($tempname4, $folderProduct);
            }
          
            $sql = "UPDATE index_text 
                    SET text = ? WHERE name = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $value, $key);
            
            foreach ($valuesArr as $k => $v){
                if(isset($valuesArr[$k])){
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