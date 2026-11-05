<?php
/* SELL - PHP */
/* Here we open the current session so we can check if the user is logged in and show their username in the navigation bar. */
/* session_start() is also used on the files Main.php, Buy.php, Swap.php, Donate.php, RegisterDB.php, ErrorRegister.php, and Logout.php. */
session_start();
?>
<!-- SELL -->
<!DOCTYPE html>

<!-- PAGE LANGUAGE -->
<html lang="es">

<!-- HEAD BEGINNING -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sell</title>
  <link rel="stylesheet" type="text/css" href="Main.css">
</head>
<!-- HEAD ENDING -->

<!-- BODY BEGINNING -->
<body style="background-color: #cdac7d;">

<!-- LANGUAGE BUTTON -->
<button id="lang-btn" onclick="toggleLanguage()">Español</button>

<!-- HEADER BEGINNING -->
<div class="linea">
  <header>
    <!-- Invisible checkbox and three-line "hamburger" icon for mobile phones -->
    <input type="checkbox" id="nav-toggle" class="nav-toggle">
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
      <section data-i18n-block="navbar-sell">
      <div class="menu">
        <a href="./Main.php">Home</a>
        <a href="./Buy.php">Buy</a>
        <a href="./Sell.php" class="active-link">Sell</a>
        <a href="./Swap.php">Swap</a>
        <a href="./Donate.php">Donate</a>
      </div>
      </section>
    </nav>
  </header>
</div>
<!-- HEADER ENDING -->

<!-- PAGE CONTENT BEGINNING -->

<!-- SELL INFORMATION SECTION BEGINNING -->
 <section class="sell-info" data-i18n-block="sell-info">
    <h1 class="main-title">Sell</h1>
    <p>Sell your used books and help others find their next read!</p>
    <p>We are developing new ways to make selling even easier for you</p>
  </section>
<!-- SELL INFORMATION SECTION ENDING -->

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
