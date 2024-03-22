<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="auto" content="divine">
    <meta name="description" content="About the litle taco shop">
    <title>Hours we work</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
 
    <header class="header">
    <h1 class="header__h1">Litle Taco Shop</h1>
    <nav class="header__nav">
          <ul class="header__ul">  
                <li>
                    <a href="index.php">Home</a>
               </li> 
                <li>
                    <a href="menu.php">Menu</a>
                   </li>
                <li>
                    <a href="contact.php">Contact</a>
                   </li> 
                <li>
                    <a href="about.php"> About</a>
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
        <figure >
          <img src="../images/project/taco (4).jpg" alt="menu-momo" title="We love tacos" >
          <figcaption class="offscreen">
            Try this delicious tacos
          </figcaption>  
        </figure>
      </section>
      <!--image end here -->

      <!--hours start here -->
            <main class="main">
              <article class="main__article">
                <p>
                  We are open 7 days a week 
                </p>
                <dl>
                  <dt>Sunday-Thursday</dt>
                  <dd>11am-9pm</dd>
                  <dt>friday-saturday</dt>
                  <dd>11am-11pm</dd>
                </dl>
                <p>
                  <a href="#"> Back to top</a>
                </p>
              </article>
            </main>

      <!-- hours ends here -->
      
      <footer class="footer">
        <p>
          <span class="nowrap" > copywrite &copy;</span>
          <span class="nowrap"> little taco shop</span> 
        </p>
     </footer>  
</body>
</html>