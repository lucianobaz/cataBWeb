<?php
/* LOGOUT - PHP */
/* Here we have the file that closes the user session when they click the Logout button. */

//First we open the current session so PHP knows which user wants to log out.
//This function is also used on the files RegisterDB.php, ErrorRegister.php, Main.php, Buy.php, Sell.php, Swap.php, and Donate.php.
session_start();

//Here we use session_unset() to erase all the saved information inside $_SESSION (like $_SESSION['name'] and $_SESSION['email'], which were taken from RegisterDB.php).
//session_unset() is also used on the file ErrorRegister.php.
session_unset();

//Then we use session_destroy() to completely close and delete the session on the server.
session_destroy();

//Now that the user is logged out, we send them back to the introduction page (Introduction.php).
//header() and exit() are also used on the file RegisterDB.php.
header("Location: Introduction.php");

//We use exit() to stop running this file right after sending the user to Introduction.php.
exit();

?>
