<?php
/* BUY - PHP */
/* Here we open the current session so we can check if the user is logged in and show their username in the navigation bar. */
/* session_start() is also used on the files Main.php, Sell.php, Swap.php, Donate.php, RegisterDB.php, ErrorRegister.php, and Logout.php. */
session_start();
?>
<!-- BUY -->
<!DOCTYPE html>

<!-- PAGE LANGUAGE -->
<html>

<!-- HEAD BEGINNING -->
<head>
  <link rel="stylesheet" type="text/css" href="./Main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
   <title>Buy</title>
</head>
<!-- HEAD ENDING -->

<!-- BODY BEGINNING -->
<body style="background-color: #cdac7d;">

<!-- LANGUAGE BUTTON -->
<button id="lang-btn" onclick="toggleLanguage()">Español</button>

<!-- HEADER BEGINNING -->
<div class="linea">
  <header>
    <!-- Invisible checkbox that controls our mobile menu -->
    <input type="checkbox" id="nav-toggle" class="nav-toggle">
        
    <!-- Clickable three-line "hamburger" icon using unicode -->
    <label for="nav-toggle" class="hamburger" id="hamburger">&#9776;</label>
        
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
      <section data-i18n-block="navbar-buy">
        <div class="menu">
          <a href="./Main.php">Home</a>
          <a href="./Buy.php" class="active-link">Buy</a>
          <a href="./Sell.php">Sell</a>
          <a href="./Swap.php">Swap</a>
          <a href="./Donate.php">Donate</a>
        </div>
      </section>
      
    </nav>
  </header>
</div>
<!-- HEADER ENDING -->

<!-- PAGE CONTENT BEGINNING -->

<!-- BOOK CARDS GRID BEGINNING -->
<section>
<div class="book">
  <!-- BOOK 1: HARRY POTTER -->
  <div class="book-item">
    <p>Harry Potter y el prisionero de Azkaban</p>
    <p>$320</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- BOOK 2: ROMEO AND JULIET -->
  <div class="book-item">
    <p>Romeo and Juliet</p>
    <p>$380</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- BOOK 3: TOM SAWYER -->
  <div class="book-item">
    <p>Tom Sawyer</p>
    <p>$340</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- BOOK 4: MUJERCITAS -->
  <div class="book-item">
    <p>Mujercitas</p>
    <p>$450</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- BOOK 5: CIUDADES DE PAPEL -->
  <div class="book-item">
    <p>Ciudades de Papel</p>
    <p>$360</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- BOOK 6: CREPUSCULO: AMANECER -->
  <div class="book-item">
    <p>Crepúsculo: Amanecer</p>
    <p>$350</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- BOOK 7: PERCY JACKSON -->
   <div class="book-item">
    <p>Percy Jackson</p>
    <p>$410</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- BOOK 8: FLEUR -->
  <div class="book-item">
    <p>Fleur</p>
    <p>$270</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>

  <!-- BOOK 9: DIME QUE ESCONDES -->
  <div class="book-item">
    <p>Dime que escondes</p>
    <p>$400</p>
    <a class="buy-btn" data-i18n-block="buy-btn">Buy</a>
  </div>
</div>
</section>
<!-- BOOK CARDS GRID ENDING -->

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
