<?php




require "db_config.php";

session_start();
$user_id = $_SESSION['user_id'];


$msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {


  	$filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "images/".$filename;
    $ph_no = $_POST['num'];
    $food_pref = $_POST['pref'];
          
    if($filename){
      $sql = "UPDATE user_details SET profile_pic = '$filename' WHERE user_id = $user_id";
      $sql2 = "UPDATE users SET profile_pic = '$filename' WHERE user_id = $user_id";
      mysqli_query($conn, $sql);
      mysqli_query($conn, $sql2);

      }
    if($ph_no){
      $sql = "UPDATE user_details SET ph_no = '$ph_no' WHERE user_id = $user_id";
      mysqli_query($conn, $sql);
      }
    if($food_pref){
      $sql = "UPDATE user_details SET food_pref = '$food_pref' WHERE user_id = $user_id";
      mysqli_query($conn, $sql);
      }
    

          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      header('Location:profile.php?upd=1');
  }


  

?>