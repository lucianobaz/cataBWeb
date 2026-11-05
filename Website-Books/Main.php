<?php
/* MAIN - PHP */
/* Here we open the current session so we can check if the user is logged in and show their username in the navigation bar. */
/* session_start() is also used on the files Buy.php, Sell.php, Swap.php, Donate.php, RegisterDB.php, ErrorRegister.php, and Logout.php. */
session_start();
?>
<!-- MAIN -->
<!DOCTYPE html>

<!-- PAGE LANGUAGE -->
<html>

<!-- HEAD BEGINNING -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="Main.css">
  <title>Main</title>
</head>
<!-- HEAD ENDING -->

<!-- BODY BEGINNING -->
<body style="background-color: #cdac7d;">

<!-- LANGUAGE BUTTON -->
<button id="lang-btn" onclick="toggleLanguage()">Español</button>

<!-- PAGE CONTENT BEGINNING -->
<main>

  <!-- HEADER BEGINNING -->
  <header>
        <!-- Invisible checkbox that controls our mobile menu -->
        <input type="checkbox" id="nav-toggle" class="nav-toggle">
        
        <!-- Clickable three-line "hamburger" icon using unicode (&#9776; and &#x2630; work as well) -->
        <label for="nav-toggle" class="hamburger">&#9776;</label>
        
    <nav class="navbar">

      <div class="logo">
        <a id="logo-link" href="./Introduction.php"><img src="./logo.png" alt="Crossed pages logo" class="logo-img"></a>

        <!--Here we check with isset() if $_SESSION['name'] (taken from RegisterDB.php) exists. If the user is logged in, we show their name using echo and htmlspecialchars() (so the text is safe to display in HTML) and the Logout button. If not, we show the Access button.-->
        <?php if (isset($_SESSION['name'])): ?>

      <span class="welcome-msg"><span data-i18n-block="welcome">Welcome</span> <?php echo htmlspecialchars($_SESSION['name']); ?></span>
      <a class="logout-btn" href="Logout.php" data-i18n-block="logout">Logout</a>
        <?php else: ?>

        <section data-i18n-block="navbar-access">
        <a id="access-link" href="RegisterU.php">Access</a>
        </section>
        
        <?php endif; ?>
      </div>

      <!-- NAVIGATION MENU -->
      <section data-i18n-block="navbar-main">
      <div class="menu">
        <a class="active-link" href="Main.php">Home</a>
        <a href="Buy.php">Buy</a>
        <a href="Sell.php">Sell</a>
        <a href="Swap.php">Swap</a>
        <a href="Donate.php">Donate</a>
      </div>
      </section>

    </nav>
  </header>
  <!-- HEADER ENDING -->


<!-- SLIDESHOW CAROUSEL BEGINNING -->
<div class="slideshow-container">

<!-- SLIDE 1: EMPIREO -->
<div class="mySlides fade slide-empireo">
  <img src="./empireo.jpg.jpeg" alt="Empireo">
</div>

<!-- SLIDE 2: HARRY POTTER -->
<div class="mySlides fade slide-harry">
  <img src="./harry.jpg.jpeg" alt="Harry Potter">
</div>

<!-- SLIDE 3: HUNGER GAMES -->
<div class="mySlides fade slide-hunger">
  <img src="./hunger.jpg.jpeg" alt="Hunger Games">
</div>

</div>
<br>

<!-- SLIDESHOW DOTS -->
<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<!-- SLIDESHOW CAROUSEL ENDING -->


<!-- SLIDESHOW JAVASCRIPT -->
<script>
//SLIDESHOW - JAVASCRIPT
//This script is in charge of automatically changing the banner image in the carousel every 4 seconds.

//What is let for? let is a keyword used to declare a variable that can be changed later.
let slideIndex = 0;
showSlides();

//------------------------------------------------------------------------------------------
//FUNCTION - This function is in charge of hiding all slides and showing the next slide every 4 seconds.
//------------------------------------------------------------------------------------------
function showSlides() {
  let i;
  //What is document.getElementsByClassName for? Is a method used to select all elements that have a specific CSS class name.
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  //First we loop through all slides and hide them (display = "none").
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }

  //We add 1 to slideIndex to move to the next image. If we pass the last slide, we go back to slide 1.
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    

  //We remove the "active" class from all indicator dots below the slideshow.
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  //We make the current slide visible (display = "block") and highlight its corresponding dot with the "active" class.
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";

  //What is setTimeout for? Is a timer function that waits a specific amount of milliseconds (4000ms = 4 seconds) before calling showSlides again.
  setTimeout(showSlides, 4000); //Changes the image every 4 seconds
}
</script>
</main>

<!-- BOOK CARDS GRID (ROW 1) BEGINNING -->
<div class="book">
  <!-- HARRY POTTER -->
  <div class="book-item">
    <p>Harry Potter y el prisionero de Azkaban</p>
    <p>$320</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- ROMEO AND JULIET -->
  <div class="book-item">
    <p>Romeo and Juliet</p>
    <p>$380</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- TOM SAWYER -->
  <div class="book-item">
    <p>Tom Sawyer</p>
    <p>$340</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>
</div>
<!-- BOOK CARDS GRID (ROW 1) ENDING -->

<!-- SELL BANNER SECTION BEGINNING -->
<section  class="sell-section" data-i18n-block="sell-section">
  <div class="sell-box">
    <h2 class="sell-title">Sell your books here</h2>
    <a href="Sell.php" class="sell-plus" aria-label="Agregar libro">+</a>
  </div>
</section>
<!-- SELL BANNER SECTION ENDING -->

<!-- BOOK CARDS GRID (ROW 2) BEGINNING -->
<div class="book">
 <!-- MUJERCITAS -->
 <div class="book-item">
    <p>Mujercitas</p>
    <p>$450</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- CIUDADES DE PAPEL -->
  <div class="book-item">
    <p>Ciudades de Papel</p>
    <p>$360</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- CREPUSCULO: AMANECER -->
  <div class="book-item">
    <p>Crepúsculo: Amanecer</p>
    <p>$350</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>
</div>
<!-- BOOK CARDS GRID (ROW 2) ENDING -->

<!-- DONATE BANNER SECTION BEGINNING -->
<section data-i18n-block="donate-section">
<a href="donate.php" class="donate-card">
    <h2>Do you want to donate your books?</h2>
    <p>Give them a second life</p>
</a>
</section>
<!-- DONATE BANNER SECTION ENDING -->

<!-- BOOK CARDS GRID (ROW 3) BEGINNING -->
<div class="book">
   <!-- PERCY JACKSON -->
   <div class="book-item">
    <p>Percy Jackson</p>
    <p>$410</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- FLEUR -->
  <div class="book-item">
    <p>Fleur</p>
    <p>$270</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- DIME QUE ESCONDES -->
  <div class="book-item">
    <p>Dime que escondes</p>
    <p>$400</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>
</div>
<!-- BOOK CARDS GRID (ROW 3) ENDING -->

<!-- SWAP BANNER SECTION BEGINNING -->
<section data-i18n-block="swap-section">
  <a href="Swap.php" class="swap-card">
    <span class="swap-icon">&#8644;</span>
    <div class="swap-text">
      <h2 class="swap-title">Want to swap books?</h2>
      <p class="swap-sub">Trade the books you already read for new stories, no money needed</p>
    </div>
  </a>
</section>
<!-- SWAP BANNER SECTION ENDING -->

<!-- PAGE CONTENT ENDING -->

<!-- FOOTER BEGINNING -->
<footer>
    <div class="footer">
        <section data-i18n-block="footer-credit">
            <p class="credit">Website created and designed by Catalina Ligüera and Tomás Correa.</p>
        </section>

        <div class="footer-emails">
          <p>catalinaliguera@gmail.com</p>
          <p>tomascorreadurante@gmail.com</p>
        </div>

        <section data-i18n-block="footer-copyright">
            <p class="credit"> ©2026 - Crossed pages, Paysandú, Uruguay.</p>
        </section>
    </div>
</footer>
<!-- FOOTER ENDING -->

<script src="translations.js"></script>

</body> <!-- BODY ENDING -->
</html> <!-- HTML ENDING -->
