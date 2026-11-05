//TRANSLATIONS - JAVASCRIPT
//This script is in charge of changing the language of the website between English and Spanish.

/* -------------------------------------------------------------- */
/* KEYWORDS EXPLANATION: */
/* -------------------------------------------------------------- */

//What is let for? let is a keyword used to declare a variable that can be changed later.
//What is const for? const is a keyword that is used to declare a variable that is constant, meaning it cannot be changed.


//We declare variables to store the dictionary data and the current language.
let translations = {}; 
let currentLang = "en"; //Default language is English

//What is fetch for? Is a method that is used to make requests to a server or load files.
//In this case, we use fetch() to request "translations.json" in order to load all the words in both languages.
fetch('translations.json')
    //What is .then for? .then is: do something after the previous thing is done.
    .then(response => {
        //If the file cannot be loaded, we throw an error.
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        //what does JSON stand for? JavaScript Object Notation, which is just a way to format data.
        //This converts the JSON response into a JavaScript object.
        return response.json();
    })
    .then(data => {
        //We save the loaded JSON data inside our translations variable.
        translations = data;
        console.log("Translations loaded successfully.");
    })
    //What is .catch for? .catch is a method that is used to handle errors of a fetch request. It means "do something if something goes wrong".
    .catch(error => {
        //If there is an error loading translations, we show an error in the console.
        console.error("Failed to load translation file:", error);
    });

//------------------------------------------------------------------------------------------
//FUNCTION - Switches language between English and Spanish when the user clicks the button.
//------------------------------------------------------------------------------------------
function toggleLanguage() {
    //If the translations data is not loaded yet, we show an alert and stop here.
    if (Object.keys(translations).length === 0) {
        alert("Translation data is still loading. Please try again in a moment.");
        return;
    }

    //If current language is English ("en"), we switch to Spanish ("es"). If it is Spanish, we switch to English.
    currentLang = (currentLang === "en") ? "es" : "en";

    //We update the text of the language button (if English, it says "Español"; if Spanish, it says "English").
    //What is document.getElementById for? Is a method that is used to select one specific element by its unique id.
    const btn = document.getElementById("lang-btn");
    btn.textContent = translations[currentLang]["buttonText"];

    //We select all elements with data-i18n-block in order to replace their content with the selected language.
    //What is document.querySelectorAll for? Is a method that is used to select all elements that match a specific CSS selector.
    const blocks = document.querySelectorAll("[data-i18n-block]");

    //What is forEach for? Is a method used to loop through every item in a list.
    blocks.forEach(block => {
        const key = block.getAttribute("data-i18n-block");
        
        //What is innerHTML for? Is a property used to change or insert text and HTML tags inside an element.
        block.innerHTML = translations[currentLang][key];
    });
}
