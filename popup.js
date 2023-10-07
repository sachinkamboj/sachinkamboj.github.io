//// JavaScript in a separate file (popup.js)
//// Wait for the DOM to be fully loaded
//document.addEventListener("DOMContentLoaded", function () {
//    // Get the popup and trigger button elements by their IDs
//    var popup = document.getElementById("popup-container");
//    var openButton = document.getElementById("open-popup");
//    var closeButton = document.getElementById("close-popup");

//    // Function to open the popup
//    function openPopup() {
//        popup.style.display = "block";
//    }

//    // Function to close the popup
//    function closePopup() {
//        popup.style.display = "none";
//    }

//    // Show the popup when the page loads
//    openPopup();

//    // Attach click event handlers to the open and close buttons
//    openButton.addEventListener("click", openPopup);
//    closeButton.addEventListener("click", closePopup);
//});


// JavaScript in a separate file (popup.js)
// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function () {
    // Get the popup and trigger button elements by their IDs
    const popup = document.getElementById("popup-container");
    const openButton = document.getElementById("open-popup");
    const closeButton = document.getElementById("close-popup");

    // Function to open the popup
    function openPopup() {
        popup.style.display = "block";
    }

    // Function to close the popup
    function closePopup() {
        popup.style.display = "none";
    }

    // Show the popup when the page loads
    openPopup();

    // Attach click event handlers to the open and close buttons
    openButton.addEventListener("click", openPopup);

    // Prevent the default behavior of the close button
    closeButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent the button's default behavior (form submission, link navigation)
        closePopup();
    });
});
