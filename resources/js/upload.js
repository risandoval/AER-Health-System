const body = document.querySelector('body')
const modalBackground = document.querySelector('#modal-background');
const importButton = document.querySelector('#import');
const uploadModalBody = document.querySelector('#upload-modal-body');
const closeButtons = document.querySelectorAll('.close-btn');

importButton.addEventListener('click', () => {
    modalBackground.classList.toggle('flex');
    modalBackground.classList.toggle('hidden');
    uploadModalBody.classList.toggle('hidden');
    body.classList.add('overflow-hidden');
});

closeButtons.forEach(closeButton => {
    closeButton.addEventListener('click', () => {
        modalBackground.classList.toggle('flex');
        modalBackground.classList.toggle('hidden');
        uploadModalBody.classList.toggle('hidden');
        body.classList.remove('overflow-hidden');
    });
});

// SUCCESS or FAIL MESSAGE
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