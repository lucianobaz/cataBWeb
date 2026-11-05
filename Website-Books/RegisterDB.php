<?php
/* REGISTER_DB - PHP */
/* Here we have the file that processes both the Registration form (to create a new user in MySQL) and the Login form (to check credentials and start the session). */

//Here we start the session so the website can save error/success messages (used on ErrorRegister.php) and remember who is logged in across pages.
//This function is also used on the files ErrorRegister.php, Logout.php, Main.php, Buy.php, Sell.php, Swap.php, and Donate.php.
session_start();

//Here we bring in the code from "Config.php" so we can use the $conn variable (taken from Config.php) to talk to our MySQL database.
require_once 'Config.php';

//We check if the user clicked the "Register" button on the registration form in RegisterU.php (which sends $_POST['register']).
//isset() is also used below for login and on the files Main.php, Buy.php, Sell.php, Swap.php, and Donate.php.
if (isset($_POST['register'])) {
    //Here we create variables to save the name and email that the user typed into the registration form (taken from RegisterU.php).
    $name = $_POST['name'];
    $email = $_POST['email'];
    //Here we create the variable $password and scramble (encrypt) the password using password_hash() and PASSWORD_DEFAULT so nobody can read the real password in the database.
    //Later, in the login section below, we check this encrypted password using password_verify().
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //We use $conn->query() (with $conn taken from Config.php) to ask MySQL if there is already a user registered with that exact email in the "users" table.
    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");

    //We check if the database found another row with the same email (num_rows > 0 means at least 1 user already has that email).
    if ($checkEmail->num_rows > 0) {
        //If the email already exists, we save an error message inside $_SESSION (which is read on the file ErrorRegister.php).
        $_SESSION['register_error'] = 'Email is already registered!';
    } else {
        //If the email is not registered yet, we run an INSERT INTO SQL command to save the new user's name, email, and encrypted password in the "users" table.
        $conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
        //We save a success message in $_SESSION (which is read on ErrorRegister.php and shown on RegisterU.php).
        $_SESSION['register_success'] = 'Registration successful!';
    }

    //In both cases (error or success), we keep the 'register' form active and send the user back to RegisterU.php without repeating code.
    //header() and exit() are also used below for login and on the file Logout.php.
    $_SESSION['active_form'] = 'register';
    header("Location: RegisterU.php");
    exit();
}

//We check if the user clicked the "Login" button on the login form in RegisterU.php (which sends $_POST['login']).
if (isset($_POST['login'])) {
    //Here we create 2 variables to save the email and password that the user typed into the login form (taken from RegisterU.php).
    $email = $_POST['email'];
    $password = $_POST['password'];

    //We ask MySQL to look for a user in the "users" table with that email address and save the answer in $result.
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");

    //We check if the database found a user with that email (num_rows > 0).
    if ($result->num_rows > 0) {
        //Here we use fetch_assoc() to save all the information of that user from the database (name, email, and encrypted password) into the variable $user.
        $user = $result->fetch_assoc();

        //Here we use password_verify() to check if the password the user typed ($password) matches the encrypted password saved in the database ($user['password']).
        if (password_verify($password, $user['password'])) {
            //If the password is correct, we save the user's name and email inside $_SESSION so the rest of the website knows they are logged in.
            //$_SESSION['name'] is later taken and used on the files Main.php, Buy.php, Sell.php, Swap.php, and Donate.php to show the welcome message.
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            //Then we send the user to the main page (Main.php) and stop the code here with exit().
            header("Location: Main.php");
            exit();
        }
    }

    //If the email was not found or the password was wrong, we save an error message and set the active form to 'login' in $_SESSION (used on ErrorRegister.php).
    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    //We send the user back to RegisterU.php so they can see the error message.
    header("Location: RegisterU.php");
    exit();
}

?>
