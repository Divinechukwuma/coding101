<?php include('partials/header.php'); ?>

<div class="wrapper">
    <h1>Contact us</h1>
    <br><br><br>

    <?php if(isset($_SESSION['del'])){
        echo $_SESSION['del'];
        unset($_SESSION['del']);
    }
    ?>

    <form action="" method="POST" >

        <table class="tbl_full">

            <tr>
                <th>SN</th>
                <th>customer_name</th>
                <th>customer_email</th>
                <th>message</th>
                <th>Action</th>
            </tr>
            <?php 
             // first the sql  query 
             //Check if there is data in data base
             $sql = "SELECT * FROM tbl_contact";
             $stmt = $conn->prepare($sql);
             $stmt->execute();
             $res = $stmt->get_result();
             $sn = 1;

            if($res->num_rows>0){

                while($rows=$res->fetch_assoc()){
                    $Id = $rows['id'];
                    $Customer_name = $rows['customer_name'];
                    $Customer_email = $rows['customer_email'];
                    $Message = $rows['message'];
                    ?>

                <tr>
                <td><?php echo $sn++ ?></td>
                <td><?php echo $Customer_name; ?></td>
                <td><?php echo $Customer_email?></td>
                <td><?php echo $Message; ?></td>
                <td>
                <a href="<?php echo SITEURL;?>delete_contact.php?id=<?php echo $Id ?>" class="btn-danger"> delete_admin</a>
                </td>
            </tr>

                <?php
                }
            }
            ?>
            

        </table>

    </form>
</div>


<?php include('partials/footer.php'); ?>