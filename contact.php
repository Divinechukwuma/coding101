<?php include('config/data.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="auto" content="divine">
    <meta name="description" content="About the litle taco shop">
    <title>Contact us</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>

  <header class="header">
    <h1 class="header__h1">Little Taco Shop</h1>
    <nav class="header__nav">
      <ul class="header__ul">
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="menu.php">Menu</a>
        </li> 
        <li>
          <a href="hours.php"> Hours</a>
        </li>
        <li>
          <a href="about.php">About</a>
        </li> 
      </ul> 
    </nav>

  </header> 

    <form action="#" class="search__form">
      <input class="search__input" type="search" name="search" placeholder="Search for Food.." required>
      <input class="search__button"  type="submit" name="submit" value="Search" class="btn btn-primary">
    </form>
  <!--image starts here-->
  <!--hero section is the part of the page where u usally see an image after the nav-bar that is is used to attract users-->
  <section class="hero">
     <h2 class="hero__h2">Bienvenidos!</h2>
    <figure>
      <img src="../images/project/taco (3).jpg" alt="Taco" title="We love tacos" >
      <figcaption class="offscreen">
        Tacos and drinks 
      </figcaption>
    </figure>
  </section>
  <!--image end here -->
  <main class="main">
    <article class="main__article">
      <h2>Our location</h2>
      <address>
        555 taco temptation lane,suite T<br>
        kansas city,MO 55555-5555
        <br><br>
        Phone: <a href="tell:+55555555">555-555-5555</a>
      </address>
    </article>

    <article class="main__article contact"> 
      <h2 class="contact__h2">Our Contact Form </h2>

      <form action="" method="POST" class="contact__form">
        <fieldset class="contact_fieldset">
          <legend class="offscreen">Send Us A Message </legend>
          <p class="contact__p">
            <label class="contact__label" for="name"> Name:</label>
            <input class="contact__input" type="text" name="customer_name"placeholder="Your Name" required>
          </p>

          <p class="contact__p">
            <label class="contact__label" for="email"> Email:</label>
            <input class="contact__input" type="text" name="customer_email"  placeholder="Your Email" required>
          </p>
 
          <p class="contact__p">
            <label class="contact__label" for="message"> Message:</label>
            <textarea  class="contact__textarea" name="message" id="message" cols="30" rows="5" 
            placeholder="Type Your Mssage here" required></textarea>
          </p>
        </fieldset>
        <button class="contact__button" name="submit" type="submit"> Send</button>
        <button class="contact__button" type="reset">Reset</button>
 
        <?php 
      
        if(isset($_POST['submit'])){
          //echo "im awesome";

          // get data from form 
          $Message = $_POST['message'];
          $Customer_email = $_POST['customer_email'];
          $Customer_name = $_POST['customer_name'];
          //Write sql query to insert infor into data base

          $sql = "INSERT INTO tbl_contact (message, customer_email, customer_name) VALUES (?, ?, ?)";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("sss", $Message,$Customer_name,$Customer_email);
          $stmt->execute();
          $res=$stmt->get_result();

          if($res == true){
             
            $_SESSION['add']="<div class='success'> Message Sent Successfully.</div>";
            //redirect
            header('location'.SITEURL.'index.php');
          }else{
            $_SESSION['add']="<div class='error'> Message Failed To Send</div>";
            //redirect
            header('location'.SITEURL.'index.php');
          }
        }
      ?>

      </form>

    </article>
  </main>
    
  <footer class="footer">
    <p>
      <span class="nowrap" > copywrite &copy;</span>
      <span class="nowrap"> little taco shop</span> 
    </p>
 </footer>  
</body>
</html>