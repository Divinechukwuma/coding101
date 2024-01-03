<?php include('partials/header.php') ?>

<br><br>
<div class="wrapper">
    <h1>Add Menu</h1>
    
    <br><br><br>

    <form action=""  class="tbl_30" enctype="multipart/form-data" method="POST">
        <table>
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" >
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
    
    if(isset($_POST['submit'])){
       // echo 'wassup';
       //Get data from form 
       $Title = $_POST['title'];
       $Price = $_POST['price'];
       //$Image = $_POST['image'];
       $Featured = $_POST['featured'];
       $Active = $_POST['active'];
    } 

    ?>

</div>

<?php include('partials/footer.php') ?>
