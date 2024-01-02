<?php include ('partials/header.php'); ?>

<br>
<div class="wrapper">
    <h1>Handle Menu</h1>
    <br><br><br>

    <a href="add_menu.php" class="btn-secondary"> admin</a>
        <br><br>

    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl_full">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Price</th>
                <th>Feature</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <tr>
                <td>1</td>
                <td>im cool</td>
                <td>8000</td>
                <td>yes</td>
                <td>no</td>
                <td>
                    <input type="submit" value="Update Menu" class="btn-secondary">
                    <input type="submit" value="Delete Menu" class="btn-danger">
                </td>

            </tr>
           
        </table>
    </form>

</div>


<?php include ('partials/footer.php'); ?>