<?php
/* REGISTER_U - PHP */
/* Here we bring in "ErrorRegister.php" so we can use the $errors, $success, and $activeForm variables and the showError(), showSuccess(), and isActiveForm() functions. */
require_once 'ErrorRegister.php';
?>
<!-- REGISTER / LOGIN -->
<!DOCTYPE html>

<!-- PAGE LANGUAGE -->
<html lang="en">

<!-- HEAD BEGINNING -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link rel="stylesheet" href="Style.css">
</head>
<!-- HEAD ENDING -->

<!-- BODY BEGINNING -->
<body>

    <!-- PAGE CONTENT BEGINNING -->

    <!-- LOGIN FORM BOX BEGINNING -->
    <!-- Here isActiveForm() (taken from ErrorRegister.php) checks if $activeForm is 'login' and adds the 'active' class so the login card becomes visible -->
    <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">

        <form id="loginForm" action="RegisterDB.php" method="post">

            <h2 data-i18n-block="login.title">Login</h2>

            <!-- Here showMessage() (taken from ErrorRegister.php) displays the login error message if the email or password was wrong in RegisterDB.php -->
            <?= showMessage($errors['login'], 'error'); ?>

            <!-- EMAIL -->
            <input type="email" name="email" placeholder="Email" required>

            <!-- PASSWORD -->
            <input type="password" name="password" placeholder="Password" required>

            <!-- LOGIN SUBMIT BUTTON -->
            <button type="submit" name="login" data-i18n-block="login.submit">Login</button>

            <!-- REGISTER REDIRECTION -->
            <p>
                <span data-i18n-block="login.noAccount">Do not have an account?</span>
                <a href="#" onclick="showForm('register-form')" data-i18n-block="login.registerLink">Register</a>
            </p>
        </form>
    </div>
    <!-- LOGIN FORM BOX ENDING -->

    <!-- REGISTER FORM BOX BEGINNING -->
    <!-- Connect the register form validation using JavaScript (JavaScript.js) -->
    <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
        <form id="registerForm" action="RegisterDB.php" method="post">

            <h2 data-i18n-block="register.title">Register</h2>

            <!-- Here showMessage() (taken from ErrorRegister.php) displays registration error or success messages sent by RegisterDB.php -->
            <?= showMessage($errors['register'], 'error'); ?>
            <?= showMessage($successMessage, 'success'); ?>

            <!-- USERNAME -->
            <input type="text" id="name" name="name" placeholder="Name" required>

            <!-- EMAIL -->
            <input type="email" name="email" placeholder="Email" required>

            <!-- PASSWORD -->
            <input type="password" id="password" name="password" placeholder="Password" required>

            <!-- REGISTER SUBMIT BUTTON -->
            <button type="submit" name="register" data-i18n-block="register.submit">Register</button>

            <!-- LOGIN REDIRECTION -->
            <p>
                <span data-i18n-block="register.hasAccount">Already have an account?</span>
                <a href="#" onclick="showForm('login-form')" data-i18n-block="register.loginLink">Login</a>
            </p>

            <!-- FEEDBACK CONTAINER (Used by JavaScript.js to show validation errors) -->
            <div id="feedback"></div>

        </form>
    </div>
    <!-- REGISTER FORM BOX ENDING -->

    <!-- PAGE CONTENT ENDING -->

<!-- LANGUAGE BUTTON -->
<div style="text-align:center; margin:20px;">
  <button id="lang-btn" onclick="toggleLanguage()">Español</button>
</div>

<script src="translations.js"></script>
<script src="JavaScript.js"></script>

<!-- Here we check if $successMessage (taken from ErrorRegister.php) is not empty. If registration succeeded, setTimeout() waits 2 seconds (2000ms) and switches to the login form using showForm() from JavaScript.js. -->
<?php if (!empty($successMessage)): ?>
    <script>
        setTimeout(function () {
            showForm('login-form');
        }, 2000);
    </script>
 <?php endif; ?>
</body> <!-- BODY ENDING -->
</html> <!-- HTML ENDING -->
