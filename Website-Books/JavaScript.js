/* VALIDATE - JAVASCRIPT (JavaScript.js) */
/* This script is in charge of checking user inputs in the Register form before sending data to PHP (RegisterDB.php) and switching between the Login and Register forms on RegisterU.php. */

/* -------------------------------------------------------------- */
/* KEYWORDS EXPLANATION: */
/* -------------------------------------------------------------- */

//what is const for? const is a keyword that is used to declare a variable that is constant, meaning it cannot be changed.
//what is addEventListener for? Is a method that is used to wait for an event to happen (like when the page finishes loading or when a form is submitted), then do something.

//We wait until the HTML page (RegisterU.php) is completely loaded before running our validation code.
document.addEventListener("DOMContentLoaded", () => {
    //what is document.getElementById for? Is a method that is used to select one specific element by its unique id.
    //We select the feedback div and the registration form from RegisterU.php once so we can reuse them below.
    const feedback = document.getElementById("feedback");
    const registerForm = document.getElementById("registerForm");

    //------------------------------------------------------------------------------------------
    //FUNCTION - This function is in charge of stopping the form submission and displaying an error message.
    //------------------------------------------------------------------------------------------
    function showError(event, message) {
        //what is event.preventDefault() for? Is a method used to stop the default browser action, like stopping a form from submitting if there is an error.
        event.preventDefault();
        feedback.textContent = message;
        feedback.className = "error";
    }

    //------------------------------------------------------------------------------------------
    //FUNCTION - This function is in charge of checking if the username and password meet all the security rules for new accounts.
    //------------------------------------------------------------------------------------------
    function validateCredentials(name, password) {
        //what is a Regular Expression (RegEx)? A pattern of characters used to test or validate if text meets specific rules.
        //what is .test() for? Is a RegEx method that returns true if text matches the pattern, or false if it does not.
        //Here we declare each RegEx pattern once so we can reuse them for both the username and the password without repeating code:
        const lowercaseRule = /[a-z]/;
        const uppercaseRule = /[A-Z]/;
        const numberRule = /[0-9]/;
        const specialCharRule = /[!@#\$%\^&\*\(\)_\+\-=\[\]{};':"\\|,.<>\/?]/;
        const lengthRule = /^.{8,18}$/;

        //1. Username Letters & Number - We check if the username has at least one lowercase letter and at least one number.
        if (!lowercaseRule.test(name) || !numberRule.test(name)) {
            return "Username must contain letters and at least one number.";
        }

        //2. Username Symbols - We check that the username does NOT contain any special characters.
        if (specialCharRule.test(name)) {
            return "Username must not have any special characters!";
        }

        //3. Password Complexity - We check that the password contains at least one lowercase letter, one uppercase letter, one number, and one symbol.
        if (!lowercaseRule.test(password) || !uppercaseRule.test(password) || !numberRule.test(password) || !specialCharRule.test(password)) {
            return "Password must contain a lowercase, uppercase, number, and a special character.";
        }

        //4. Length - We check if both the username and the password have between 8 and 18 characters.
        if (!lengthRule.test(name) || !lengthRule.test(password)) {
            return "Username and password must have 8-18 characters.";
        }

        //If all requirements are met, we return null meaning there are no errors.
        return null;
    }

    //------------------------------------------------------------------------------------------
    //REGISTRATION FORM SUBMIT - We listen for when the user submits the registration form to validate credentials before sending them to RegisterDB.php.
    //------------------------------------------------------------------------------------------
    if (registerForm) {
        registerForm.addEventListener("submit", function(event) {
            const name = registerForm.elements["name"].value;
            const password = registerForm.elements["password"].value;

            //We validate the username and password using our validateCredentials() function.
            const validationError = validateCredentials(name, password);

            if (validationError) {
                //If there is an error, we call showError() to stop the form and show the message.
                showError(event, validationError);
                return;
            }

            //If all requirements are met, we clear any previous error message so the form submits normally to RegisterDB.php.
            feedback.textContent = "";
        });
    }
});

//------------------------------------------------------------------------------------------
//FUNCTION - This function is in charge of switching between the Login form and the Register form on RegisterU.php.
//------------------------------------------------------------------------------------------
function showForm(formId) {
    //what is document.querySelectorAll for? Is a method that is used to select all elements that match a specific CSS selector.
    //First we remove the "active" class from all .form-box containers so both forms are hidden (connects with .form-box in Style.css).
    document.querySelectorAll (".form-box").forEach(form => form.classList.remove("active"));
    //Then we add the "active" class only to the form that the user clicked (either "login-form" or "register-form") so it appears on screen.
    document.getElementById(formId).classList.add("active");
}
