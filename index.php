<?php include('config/data.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="auto" content="divine">
  <meta name="description" content="About the litle taco shop">
  <title>Litle taco shop</title>
  <link rel="stylesheet" href="css/style2.css">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>

  <header class="header">
    <h1 class="header__h1">Litle Taco Shop</h1>
    <nav class="header__nav">
      <ul class="header__ul">
        <li>
          <a href="menu.php">Menu</a>
        </li>
        <li>
          <a href="hours.php">Hours</a>
        </li> 
        <li>
          <a href="contact.php"> Contact Us</a>
        </li>
        <li>
          <a href="contact.php">About</a>
        </li> 
      </ul> 
    </nav>
  </header> 

  <form action="#" method="POST" class="search__form">
    <input class="search__input" type="search" name="search" placeholder="Search for Food.." required>
    <input class="search__button"  type="submit" name="submit" value="Search" class="btn btn-primary">
  </form>
  <!--image starts here-->
  <!--hero section is the part of the page where u usally see an image after the nav-bar that is is used to attract users-->
  <section class="hero">
     <h2 class="hero__h2">Bienvenidos!</h2>
    <figure>
      <img class="image" src="../images/project/project pics (5).jpg" alt="cake" title="We love tacos" height="150px">
      <figcaption class="offscreen">
        Tacos and drinks 
      </figcaption>
    </figure>
  </section>
  <!--image end here -->
  <?php 
   if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
   }
  ?>
<!--main article start here -->
<main class="main">
    <article class="main__article menu">
      <h2 class="menu__h2">Our Menu</h2>

      <table class="menu__container">
        <caption class="offscreen">Our Tacos</caption>
        <thead>
          <tr>
            <th class="menu__header" scope="col">Tacos</th>
            <th class="menu__header" scope="col"> Quantity</th>
            <th class="menu__header" scope="col"> Price</th>
          </tr>
        </thead>

        <?php 
       $sql = "SELECT * FROM tbl_menu WHERE active = 'yes' AND featured = 'yes'";
       $stmt = $conn->prepare($sql);
      // $stmt->bind_param("ss", $yes, $yes);
       $stmt->execute();
       $res = $stmt->get_result();
       
        if($res->num_rows>0){

          //fetch the data from database
          while($row=$res->fetch_assoc()){
          $Title = $row['title'];
          $Price = $row['price'];
          $Image_name = $row['image_name'];
         ?>
          <tbody>
          <tr>
            <th class="menu__item menu__cr" scope="row" rowspan="4">
              Crunchy
            </th>
            <td class="menu__item"><?php echo $Title?></td>
            <td class="menu__item">$<?php echo $Price?> 
           
            <?php
                    //Check whether image is available or not

                    if($Image_name==""){

                        //Display message
                        echo "<div class='error'>Image not available.</div>";
                    }else{

                        //Image available
                        ?>
                         <img src="<?php echo SITEURL?>./images/tacos<?php echo $Image_name;?>" alt="tacos" class="img-responsive img-curve">
                        <?php
                    }
                    ?>

                    

          </td>
          </tr>

           

         <!-- <tr>
            <th class="menu__item menu__dr" scope="row" rowspan="3">
              Drinks
            </th>
            <td class="menu__item">1</td>
            <td class="menu__item">$2.00 <img src="../images/project/drinks.jpg" class="menu__item" alt=""></td>
          </tr>
        </tbody> -->

          <?php

          }
        }


          ?>

<?php 
       $sql2 = "SELECT * FROM tbl_menu WHERE active = 'yes' AND featured = 'no'";
       $stmt2  = $conn->prepare($sql2);
      // $stmt->bind_param("ss", $yes, $yes);
       $stmt2->execute();
       $res2 = $stmt2->get_result();
       
        if($res2->num_rows>0){

          //fetch the data from database
          while($row2=$res2->fetch_assoc()){
          $Title2 = $row2['title'];
          $Price2 = $row2['price'];
          $Image_name2 = $row2['image_name'];
         ?>
          <tbody>
          <tr>
            <th class="menu__item menu__sf" scope="row" rowspan="4">
              Soft
            </th>
            <td class="menu__item"><?php echo $Title2?></td>
            <td class="menu__item">$<?php echo $Price2?> 
           
            <?php
                    //Check whether image is available or not

                    if($Image_name2==""){

                        //Display message
                        echo "<div class='error'>Image not available.</div>";
                    }else{

                        //Image available
                        ?>
                         <img src="<?php echo SITEURL?>./images/tacos<?php echo $Image_name2;?>" alt="tacos" class="img-responsive img-curve">
                        <?php
                    }
                    ?>

                    

          </td>
          </tr>

           

         <!--<tr>
            <th class="menu__item menu__dr" scope="row" rowspan="3">
              Drinks
            </th>
            <td class="menu__item">1</td>
            <td class="menu__item">$2.00 <img src="../images/project/drinks.jpg" class="menu__item" alt=""></td>
          </tr>
        </tbody>-->

          <?php

          }
        }


          ?> 

        <tfoot>
          <tr>
            <td class="menu__item menu__cs " colspan="3">
              chips &amp; salsa $2
            </td>
          </tr>
        </tfoot>
      </table>


      <!--footer starts here -->
      <footer class="footer">
        <p>
          <span class="nowrap"> copywrite &copy;</span>
          <span class="nowrap"> little taco shop</span>
        </p>
      </footer>
</body>

</html>
<!--footer ends here -->