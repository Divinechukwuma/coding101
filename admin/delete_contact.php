<?php  
//include the data base
include('../config/data.php');


if(isset($_SESSION['del'])){
    echo $_SESSION['del'];
    unset($_SESSION['del']);
}

// check if the connnection is set 
if(isset($_GET['id'])){
    
    //confirm the id 
    $Id = $_GET['id'];

    $sql = "DELETE FROM tbl_contact WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $Id); // Assuming id is an integer
    $stmt->execute();
    $res = $stmt->get_result();

    if($res==true){
         // Data deleted successfully
         $_SESSION['del'] = "<div class='success'>Admin details Deleted successfully.</div>";
         header("location: manage_contact.php");
    }else{
       // Data failed to delete 
       $_SESSION['del'] = "<div class='error'>Admin details Failed to Delete.</div>";
       header("location: manage_contact.php");
    }

    
}
$stmt->close();
$conn->close();

?>