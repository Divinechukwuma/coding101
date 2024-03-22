<?php
include('partials/header.php');

if(isset($_GET['id'])){
    $Id = $_GET['id'];
}

if (isset($_SESSION['new'])) {
    echo $_SESSION['new'];
    unset($_SESSION['new']);
}
?>

<div class="wrapper">
    <h1>Update Password</h1>
    <br><br><br>

    <form action="" method="POST">
        <table class="tbl_30">
            <tr>
                <td>New Password</td>
                <td>
                    <input type="password" name="new_password" placeholder="New password">
                </td>
            </tr>

            <tr>
                <td>Confirm Password</td>
                <td>
                    <input type="password" name="confirm_password" placeholder="Confirm password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $Id; ?>">
                    <input type="submit" name="submit" value="Update Password" class="btn-secondary">
                </td>
            </tr>
        </table>
     
        
    <?php
    //first get the data from the form 
    if (isset($_POST['submit'])) {
        $Id = $_POST['id'];
        $New_password = $_POST['new_password'];
        $Confirm_password = $_POST['confirm_password'];

        // Validate and sanitize inputs here

        if (empty($New_password) || empty($Confirm_password)) {
            $_SESSION['new'] = "<div class='error'>All password fields must be filled.</div>";
            header("location: update_password.php");
            exit();
        }
      //the error handling
        if ($New_password !== $Confirm_password) {
            $_SESSION['new'] = "<div class='error'>New password and confirm password do not match.</div>";
            header("location: update_password.php");
            exit();
        }

        // Retrieve the current hashed password from the database
        $sql = "SELECT password FROM tbl_admin WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $Id);
        $stmt->execute();
        $result = $stmt->get_result();

        //excute the query with a condition 

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //fetching the password
            $currentPasswordFromDB = $row['password'];

            //make sure u verify the password
            if (password_verify($New_password, $currentPasswordFromDB)) {
                // Passwords match, no need to update
                $_SESSION['new'] = "<div class='success'>Password is the same as the current one.</div>";
                header("location: update_password.php");
            } else {
                // Update the password
                $hashed_new_password = password_hash($New_password, PASSWORD_DEFAULT);

                $sql2 = "UPDATE tbl_admin SET password = ? WHERE id = ?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("si", $hashed_new_password, $Id);
                $stmt2->execute();

                if ($stmt2->affected_rows > 0) {
                    // Password updated successfully
                    $_SESSION['new'] = "<div class='success'>Password updated successfully.</div>";
                    header("location: manage_admin.php");
                } else {
                    // No rows affected, password update failed
                    $_SESSION['new'] = "<div class='error'>Failed to update password.</div>";
                    header("location: update_password.php");
                }
            }
        } else {
            // User does not exist
            echo 'User does not exist';
            die();
        }
    }
    ?>


    </form>
</div>

<?php include('partials/footer.php'); ?>
