<?php include('partials/header.php'); ?>

<br>
<div class="wrapper">
    <h1>Handle Menu</h1>
    <br><br><br>
    <?php

    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    ?>

    <br><br>
    <a href="add_menu.php" class="btn-secondary"> Add Menu</a>
    <br><br>

    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl_full">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Price</th>
                <td>image</td>
                <th>Feature</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php

            //Select from database
            $sql = "SELECT * FROM tbl_menu";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $res = $stmt->get_result();
            $sn = 1;


            //execute the query 
            if ($res->num_rows > 0) {

                //Fetch data from database
                while ($row = $res->fetch_assoc()) {
                    $Id = $row['id'];
                    $Title = $row['title'];
                    $Price = $row['price'];
                    $Image_name = $row['image_name'];
                    $Featured = $row['featured'];
                    $Active = $row['active'];

            ?>


                    <tr>
                        <td><?php echo htmlspecialchars($sn++); ?></td>
                        <td><?php echo htmlspecialchars($Title); ?></td>
                        <td><?php echo htmlspecialchars($Price); ?></td>
                        <td>
                            <?php
                            // Check whether we have an image or not 
                            if ( $Image_name == "") {
                                // We do not have an image. Display an error message
                                echo "<div class='error'> Image not added.</div>";
                            } else {
                                // We have an image, display the image 
                            ?>
                                <img src="<?php echo SITEURL; ?>.\images\tacos\<?php echo htmlspecialchars( $Image_name); ?>"  >
                            <?php
                            }
                            ?>

                        </td>
                        </td>
                        <td><?php echo htmlspecialchars($Featured); ?></td>
                        <td><?php echo htmlspecialchars($Active); ?></td>
                        <td>
                            <input type="submit" value="Update Menu" class="btn-secondary">
                            <input type="submit" value="Delete Menu" class="btn-danger">
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