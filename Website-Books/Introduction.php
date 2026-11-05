<!-- INTRODUCTION -->
<!DOCTYPE html>

<!-- PAGE LANGUAGE -->
<html lang="en">

<!-- HEAD BEGINNING -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crossed pages</title>
    <link rel="stylesheet" href="./Main.css">
</head>
<!-- HEAD ENDING -->

<!-- BODY BEGINNING -->
<body style="background-color: #cdac7d;">

<!-- HEADER BEGINNING -->
<header>
    <div class="linea">
        <!-- Invisible checkbox that controls our mobile menu -->
        <input type="checkbox" id="nav-toggle" class="nav-toggle">

        <!-- Clickable three-line "hamburger" icon using unicode -->
        <label for="nav-toggle" class="hamburger" id="hamburger">&#9776;</label>

        <nav class="navbar">
            <!-- LOGO -->
            <div class="logo">
                <a><img src="./logo.png" alt="Crossed pages logo" class="logo-img"></a>
            </div>

            <!-- NAVIGATION LINKS -->
            <section data-i18n-block="nav">
            <div class="menu" id="nav">
                <a id="color" href="Main.php">Main</a>
                <a id="access-link" href="RegisterU.php">Access</a>
            </div>
            </section>

        </nav>
    </div>
</header>
<!-- HEADER ENDING -->

<!-- LANGUAGE BUTTON -->
<div style="text-align:center; margin:20px;">
  <button id="lang-btn" onclick="toggleLanguage()">Español</button>
</div>

<!-- PAGE CONTENT BEGINNING -->

<!-- MAIN TITLE BEGINNING -->
<div class="titulo">
    <section data-i18n-block="main-title">
        <h1>Crossed pages</h1>
    </section>
</div>
<!-- MAIN TITLE ENDING -->

<!-- HOW IT WORKS SECTION BEGINNING -->
<div class="how_works">
    <img src="./Essential-books.avif" alt="Essential Books">
    <section data-i18n-block="how-works">
        <p>This website serves as a community for book lovers to easily buy, swap, donate, or sell second-hand books in one secure place. By giving pre-loved stories a new home, it offers an affordable way to enjoy reading while helping the environment through sustainable re-use.</p>
    </section>
</div>
<!-- HOW IT WORKS SECTION ENDING -->

<!-- PLANS GRID CARDS BEGINNING -->
<div>
    <section data-i18n-block="plans">
    <h1 class="main-title">Plans</h1>

    <!-- GRID CONTAINER -->
    <div class="container">

        <!-- DONATE -->
        <a href="Donate.php" class="grid-item item-donate">
                <h3 class="item-text">Donate</h3>
                <p class="item-text item-description">Make a difference by sharing culture. Give away your used books so they can reach schools, libraries, or communities in need.</p>
        </a>

        <!-- SELL -->
        <a href="Sell.php" class="grid-item item-sell">
                <h3 class="item-text">Sell</h3>
                <p class="item-text item-description">Have you finished a book you no longer want? Find someone who wants it and sell it for a reasonable price.</p>
        </a>

        <!-- BUY -->
        <a href="Buy.php" class="grid-item item-buy">
                <h3 class="item-text">Buy</h3>
                <p class="item-text item-description">Discover thousands of titles at great prices. Pick your favorite book and pay securely.</p>
        </a>

        <!-- TRADE -->
        <a href="Swap.php" class="grid-item item-trade">
                <h3 class="item-text">Trade</h3>
                <p class="item-text item-description">Already finished your books? Connect with other readers, offer the titles you no longer need, and trade them for new stories without spending money.</p>
        </a>

    </div>
</section>
</div>
<!-- PLANS GRID CARDS ENDING -->

<!-- ABOUT US SECTION BEGINNING -->
<div class="us">
    <section data-i18n-block="about-us-title">
        <h1>About us</h1>
    </section>
    <div class="us-content">
        <section data-i18n-block="about-us-text">
            <p>We are two students from ITSP and passionate readers who decided to launch this project after noticing that there aren't many options for what to do with books that have already been read.</p>
            <br>
        </section>
        <img class="img" src="./us.JPEG" alt="About Us">
        <br>
    </div>
</div>
<!-- ABOUT US SECTION ENDING -->

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
