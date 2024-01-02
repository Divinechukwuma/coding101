<?php include('partials/header.php'); ?>

<div class="wrapper">
    <h1>Update Admin</h1>
    <br><br><br>

    <?php
    if (isset($_GET['id'])) {
        $Id = $_GET['id'];

        $sql = "SELECT * FROM tbl_admin WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $Id);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $Full_name = $row['full_name'];
            $Username = $row['username'];
        } else {
            // Redirect to manage admin page 
            header('location:' . SITEURL . 'manage_admin.php');
        }
    }
    ?>

    <?php
    if (isset($_SESSION['new'])) {
        echo $_SESSION['new'];
        unset($_SESSION['new']);
    }
    ?>

</div>

<form action="" method="POST">
    <table class="tbl_30">
        <tr>
            <td>Fullname</td>
            <td>
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($Full_name); ?>">
            </td>
        </tr>

        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="username" value="<?php echo htmlspecialchars($Username); 
                // when passing out data or echoing out data always  sanitize it ?>">
            </td> 
        </tr>

        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $Id; ?>">
                <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['submit'])) {
    $Id = $_POST['id'];
    $Full_name = $_POST['full_name'];
    $Username = $_POST['username'];

    // always use error handling after each query 
    if (empty($Full_name) || empty($Username)) {
        $_SESSION['new'] = "<div class='error'>All fields must be filled.</div>";
        header("location: update_admin.php");
        exit();
    }

    $sql2 = "UPDATE tbl_admin SET full_name = ?, username = ? WHERE id = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("ssi", $Full_name, $Username, $Id);
    $stmt2->execute();

    if ($stmt2->affected_rows > 0) {
        // Data updated successfully
        $_SESSION['new'] = "<div class='success'>Admin details updated successfully.</div>";
        header("location: manage_admin.php");
    } else {
        // No rows affected, update failed
        $_SESSION['new'] = "<div class='error'>Failed to update admin details.</div>";
        header("location: update_admin.php");
    }
}
?>

<?php include('partials/footer.php');?>
