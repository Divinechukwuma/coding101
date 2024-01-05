<?php include('partials/header.php'); ?>

<?php
//Check whether id is set or not 
if (isset($_GET['id'])) {
    //Get all the details
    //echo "im cool"
    $Id = $_GET['id'];

    //sql query to get the selected food 
    $sql2 = "SELECT * FROM tbl_menu WHERE id=?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("i", $Id);
    $stmt2->execute();
    $res2 = $stmt2->get_result();


    //Get the value based on query executed
    $row2 = $res2->fetch_assoc();
    //Get individual value of selected food 
    $Title = $row2['title'];
    $Price = $row2['price'];
    $Current_image = $row2['image_name'];
    $Featured = $row2['featured'];
    $Active = $row2['active'];
} else {
    //Redirect to manage food 
    header('location:' . SITEURL . 'manage_menu.php');
}
?>
<div class="wrapper">
    <h1>Update food</h1>
    <br><br><br>

    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">

            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Title" value="<?php echo $Title; ?>">
                </td>
            </tr>

            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price" value="<?php echo $Price; ?>">
                </td>
            </tr>

            <tr>
                <td>current image:</td>
                <td>
                    <?php

                    if ($Current_image == "") {

                        //Image not available

                        echo "<div class='error'>Image not available.</div>";
                    } else {

                        //Image available display image
                    ?>
                        <img src="<?php echo SITEURL ?>./images/tacos<?php echo $Current_image; ?>" width="150px">
                    <?php
                    }

                    ?>
                </td>
            </tr>

            <tr>
                <td>Select new image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if ($Featured == "yes") {
                                echo "checked";
                            } ?> type="radio" name="feature" value="yes">Yes
                    <input <?php if ($Featured == "no") {
                                echo "checked";
                            } ?> type="radio" name="feature" value="no">No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if ($Active == "yes") {
                                echo "checked";
                            } ?> type="radio" name="active" value="yes">Yes
                    <input <?php if ($Active == "no") {
                                echo "checked";
                            } ?> type="radio" name="active" value="no">No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $Id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $Current_image; ?>">
                    <input type="submit" name="submit" value="Update food" class="btn-secondary">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {

        // echo 'button clicked';
        //1.Get all the details from form
        $Id = $_POST['id'];
        $Title = $_POST['title'];
        $Price = $_POST['price'];
        $Current_image = $_POST['current_image'];
        $Featured = $_POST['feature'];
        $Active = $_POST['active'];

        //2.Upload the image if selected 
        //Check whether  upload button is clicked or not

        if (isset($_FILES['image']['name'])) {
            // New image name
            //Rename the image 
            $Image_name = $_FILES['image']['name']; //New image name 

            //Check whether the file is available or not 
            if ($Image_name != "") {

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
                //3.Remove the image if new image is uploaded and current image exist
                //B.remove current image if available 

                if ($Current_image !== "") {
                    //Current image is available
                    //Remove the image 
                    $Remove_path = "./images/tacos" . $Current_image;

                    $Remove = unlink($Remove_path);

                    //Check whether the image is recovered or not

                    if ($Remove == false) {
                        //Failed to remove the images is recovered or not 
                        $_SESSION['remove'] = "<div class='error'>Failed to remove current image.</div>";
                        //Redirect to food page
                        header('location:' . SITEURL . 'manage_menu.php');
                        //stop process
                        die();
                    }
                }
            } else {
                $Image_name = $Current_image;
            }
        } else {
            $Image_name = $Current_image;
        }

        //4.Update the food in database

        $sql = "UPDATE tbl_menu SET 
        title = ?,
        price = ?,
        image_name = ?,
        featured = ?,
        active = ?
        WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsssi", $Title, $Price, $Image_name, $Featured, $Active, $Id);
        $stmt->execute();
        $res = $stmt->get_result();

        // Check whether the query is executed or not 
        if ($res === true) {
            // Query executed and menu updated 
            $_SESSION['up'] = "<div class='success'>Menu updated successfully.</div>";
            // Redirect
            header('location: ' . SITEURL . 'manage_menu.php');
        } else {
            // Failed to update
            $_SESSION['up'] = "<div class='error'>Failed to update Menu.</div>";
            // Redirect
            header('location: ' . SITEURL . 'manage_menu.php');
        }
    }
    ?>

</div>
<?php include('partials/footer.php'); ?>