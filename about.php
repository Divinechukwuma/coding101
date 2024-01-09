<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="auto" content="divine">
    <meta name="description" content="About the litle taco shop">
    <title>About LTS</title>
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
                    <a href="hours.php">Hours</a>
                   </li> 
                <li>
                    <a href="contact.php"> Contact</a>
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
          <img class="new__image" src="../images/project/project pics (6).jpg" alt="menu-momo" title="We love tacos">
          <figcaption class="offscreen">
            Try this delicious tacos
          </figcaption>  
        </figure>
      </section>
      <!--image end here -->

<!--main article starts here -->

<main class="main">
      <article id="about" class="main__article about"> 
        <h2> About <abbr title="the little taco shop "> LTS</abbr></h2>
        <p>
          <abbr title="the little taco shop">LTS</abbr>Was Founded in <time
          datetime="2023">2023</time>.Our Shop
          Was built from a <strong>Love Of Tacos</strong>  We hope our shop adds unique and interesting place to out little
        </p>
        <aside class="about__trivia" >
          <h3>Taco Trivia</h3>
            <details>
              <summary>When did tacos first appear in the united states?<summary>

                <p class="about__trivia-answer">
                  Jeffery M.pilcher, taco historian and a professor of hostory at the university of minnesota,says the earliest mention of taco in the united states are in the newspaper from <time datetime="1905"></time>.(source:<cite><a href="https://www.smithsonianmag.com/arts-culture/where-did-the taco-come-from-81228162/" target="_blank"> Smithsonian magazine</a></cite>)
                </p>
            </details>
        </aside>
      </article>
</main>

<!--main article ends here -->

      
   <footer class="footer">
      <p>
        <span class="nowrap" > copywrite &copy;</span>
        <span class="nowrap"> little taco shop</span> 
      </p>
   </footer>  
</body>
</html>