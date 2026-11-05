<?php 
/* ERROR_REGISTER - PHP */
/* Here we have the file that reads error and success messages from the session and displays them on RegisterU.php. */

//First we open the current session so we can read any error or success messages saved by RegisterDB.php.
//This function is also used on the files RegisterDB.php, Logout.php, Main.php, Buy.php, Sell.php, Swap.php, and Donate.php.
session_start();

//Here we create an array called $errors to store login or registration error messages (taken from RegisterDB.php).
//What is ?? for? If $_SESSION['login_error'] or $_SESSION['register_error'] does not exist, it saves an empty text ('') instead of giving an error.
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? '',
];

//Here we save the registration success message (taken from RegisterDB.php) in the variable $successMessage.
$successMessage = $_SESSION['register_success'] ?? '';
    
//Here we save which form ('login' or 'register') should be visible on the screen (taken from RegisterDB.php). By default, it shows 'register'.
$activeForm = $_SESSION['active_form'] ?? 'register';

//Here we use session_unset() to clear the messages from the session so they disappear when the user refreshes the page.
//session_unset() is also used on the file Logout.php.
session_unset();

//------------------------------------------------------------------------------------------
//FUNCTION - This function is in charge of showing an error or success message inside a <p> tag if the message is not empty.
//------------------------------------------------------------------------------------------
//This single function replaces having two separate functions for error and success, and is called on RegisterU.php.
function showMessage($message, $type = 'error') {
    //What is !empty() for? It checks if the $message variable is NOT empty. If it has text, it returns the <p> HTML tag with 'error-message' or 'success-message'; if it is empty, it returns nothing ('').
    return !empty($message) ? "<p class='{$type}-message'>$message</p>" : '';
}

//------------------------------------------------------------------------------------------
//FUNCTION - This function checks which form should be visible on the screen and adds the 'active' CSS class.
//------------------------------------------------------------------------------------------
//This function is called on the file RegisterU.php and connects with .form-box.active in Style.css.
function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>
