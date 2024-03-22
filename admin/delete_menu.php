<?php 
//include config
include ('../config/data.php');

//get the id and image name

if(isset($_GET['id']) && isset($_GET['image_name'])){

   // echo "im cool";

   //get 1d and image name

   $Id = $_GET['id'];
   $Image_name = $_GET['image_name'];


   //Delete image if available 

   if($Image_name = !""){

    // set a path to access the file and delete if available 

    $Path ="./images/tacos".$Image_name;

     $remove = unlink($Path);

     if($remove==true){
 
        $_SESSION['delete'] = "<div class=' success'>Image remove successfully.</div>";
        
        header('location:'.SITEURL.'/manage_menu.php');
            //Stop the process of deleted food image
            die();

     }
   }

   //prepared sql statement
   $sql = "DELETE FROM tbl_menu WHERE id = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("i", $Id); // Assuming id is an integer
   $stmt->execute();
   $res = $stmt->get_result();

    //Check whether the query is executed or not
    //Redirect to manage food with session message 
    if($res==true){
        //Food deleted 
        $_SESSION['delete']= "<div class='success'>Menu deleted successfully.</div>";
        header('location:'.SITEURL.'manage_menu.php');

    }else{
        //Food not deleted 
        $_SESSION['delete']= "<div class='error'>Failed to delete Menu</div>";
        header('location:'.SITEURL.'manage_menu.php');
    }
 }else{

    //Redirect to food page 
    //echo "Redirect"
    $_SESSION['delete'] = "<div class='error'>Unauthorized Access</div>";
    header('location:'.SITEURL.'manage_menu.php');
 }


?>