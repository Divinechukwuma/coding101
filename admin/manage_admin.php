<?php include 'partials/header.php'?>

<div class="container">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br><br><br>
        <?php
       
        if(isset($_SESSION['new'])){
            echo $_SESSION['new'];
            unset($_SESSION['new']);
        }
            
        ?>
        <br><br><br>

        <a href="add_admin.php" class="btn-secondary"> admin</a>
        <br><br>

        <form action="" method="POST" >
            <table class="tbl_full">
                <tr>
                    <th>SN</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                //Check if there is data in data base
               $sql = "SELECT * FROM tbl_admin";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $res = $stmt->get_result();
                $sn = 1;
          
                if($res->num_rows>0){

                    //fetch the data from database
                    while($row=$res->fetch_assoc()){
                    $Id = $row['id'];
                    $Fullname = $row['full_name'];
                    $Username = $row['username'];
                    ?>

                <tr>
                    <td><?php  echo htmlspecialchars($sn++);?></td>
                    <td><?php echo  htmlspecialchars($Username);?></td>
                    <td><?php  echo htmlspecialchars($Fullname); ?></td>
                    <td>
                    <a href="<?php echo SITEURL?>update_password.php?id=<?php echo $Id ?>" class="btn-primary">Update password</a>
                        <a href="<?php echo SITEURL?>update_admin.php?id=<?php echo $Id;?>" class="btn-secondary">update_admin </a>
                        <a href="<?php echo SITEURL;?>delete_admin.php?id=<?php echo $Id ?>" class="btn-danger"> delete_admin</a>
                    </td>
                </tr>

                    <?php 

                    }
                }else{
                    echo 'failed to add';
                 }

                 $stmt->close();
                 $conn->close();

                ?>

            </table>
        </form>

    </div>
</div>

<?php include 'partials/footer.php'?>