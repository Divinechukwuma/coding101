<?php include('partials/header.php') ?>

<br><br>
<div class="wrapper">
    <h1>Add Menu</h1>
    <br><br><br>

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    ?>

    <form action="" class="tbl_30" enctype="multipart/form-data" method="POST">
        <table>
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title">
                </td>
            </tr>

            <tr>
                <td>Price</td>
                <td>
                    <input type="number" name="price">
                </td>
            </tr>

            <tr>
                <td>Image</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="yes">yes
                    <input type="radio" name="featured" value="no">No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="yes">yes
                    <input type="radio" name="active" value="no">No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" class="btn-secondary">
                </td>
            </tr>

        </table>
    </form>

    <?php

    if (isset($_POST['submit'])) {
        // Get data from form 
        $Title = $_POST['title'];
        $Price = $_POST['price'];


        //when using radio for geting form data make sure it is checked if it clicked 
        if (isset($_POST['featured'])) {
            $Featured = $_POST['featured'];
        } else {
            $Featured = "NO";
        }
        if (isset($_POST['active'])) {
            $Active = $_POST['active'];
        } else {
            $Active = "NO";
        }


        //FILE||UPLOAD 

        //Check whether the image is selected or not
        if (isset($_FILES['image']['name'])) {

            $Image_name = $_FILES['image']['name'];

            //File type validation
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
            $ext = strtolower(pathinfo($Image_name, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowedExtensions)) {
                //Invalid file type
                //Handle accordingly (show error message)

                echo "Invalid file type. Allowed types: 'jpg','jpeg','png','gif','svg'";
            } else {

                //Image file limit
                $maxFileSize = 5 * 1024 * 1024; //5 mb

                if ($_FILES['image']['size'] > $maxFileSize) {

                    //File size exceeds the limit 
                    //Handle accordinly show error message (REJECT UPLOAD)

                    echo " File size exceeds the limit of 5 mb";
                } else {

                    //Sanitize file name
                    $Image_name = preg_replace("/[^a-zA-Z0-9.]/", "_", basename($Image_name));

                    //Prevent file overwriting
                    $Image_name = "Tacos" . rand(0000, 9999) . '_' . time() . '.' . $ext;

                    //Move uploaded files to non-web accessible directory

                    $src =  $_FILES['image']['tmp_name'];
                    $dst = "./images/tacos" . $Image_name;

                    $Upload = move_uploaded_file($src, $dst);

                    //Check whether image uploded or not 
                    if ($Upload == false) {

                        //Failed to upload the image
                        //Redirect to add food page with error message
                        echo "failed to upload image";
                    }
                }
            }
        } else {
            $Image_name = ""; //setting default value to false 
        }

        //sql query to insert into the database
        $sql = "INSERT INTO  tbl_menu (title, price, image_name, featured, active ) VALUE(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsss", $Title, $Price, $Image_name, $Featured, $Active);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Data inserted
            $_SESSION['add'] = "<div class='success'>Menu Added successfully.</div>";
            header("location: manage_menu.php");
        } else {
            // Failed to insert data
            $_SESSION['add'] = "<div class='error'>Menu To add admin.</div>";
            header("location: add_menu.php");
        }

        $stmt->close();
    }

    ?>

</div>

<?php include('partials/footer.php') ?>