const msgCloseButton = document.getElementById("msgCloseButton");
const successMessage = document.getElementById("successMessage");

msgCloseButton.addEventListener("click", function() {
    successMessage.style.display = "none";
});

var duration = 5000; // 5 seconds in milliseconds
var interval = 50; // update interval in milliseconds
var increment = interval / duration * 100; // increment percentage per interval

var width = 100;
var timer = setInterval(function() {
    width -= increment;
    timerBar.style.width = width + "%";

    if (width <= 0) {
        clearInterval(timer);
        successMessage.style.display = "none";
    }
}, interval);