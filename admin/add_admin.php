<?php include 'partials/header.php';?>

<div class="wrapper">
    <h1>Add Admin</h1>
    <br><br><br>

      <form action="" method="POST">
        <table class="tbl_30">

        <tr>
                <td>Fullname</td>
                <td>
                    <input type="text" name="full_name" placeholder="Insert Your Fullname">
                </td>
            </tr>

            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username" placeholder="Insert Your Username">
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" placeholder="Your password">
                </td>
            </tr>
             
             <tr>
                <td colspan="3">
                    <input type="submit" name="submit" class="btn-secondary">
                </td>
             </tr>

        </table>

        <?php
        if(isset($_POST['submit'])){
            //echo 'im cool'
            $Fullname  = $_POST['full_name'];
            $Username = $_POST['username'];
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        

            $sql = "INSERT INTO tbl_admin (full_name, username, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $Fullname, $Username, $Password);
            $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Data inserted
        $_SESSION['add'] = "<div class='success'>Admin Added successfully.</div>";
        header("location: manage_admin.php");
    } else {
        // Failed to insert data
        $_SESSION['add'] = "<div class='error'>Failed To add admin.</div>";
        header("location: add_admin.php");
    }

    $stmt->close();
}









        ?>


      </form>
</div>

<?php include 'partials/footer.php';?>