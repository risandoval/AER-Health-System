const body = document.querySelector('body')
const modalBackground = document.querySelector('#modal-background');
const modals = document.querySelectorAll('.modal');
const editButton = document.querySelector('#edit');
const editModalBody = document.querySelector('#edit-modal-body');
const changePassword = document.querySelector('#change-password');
const changePasswordModalBody = document.querySelector('#change-password-modal-body');
const saveButtons = document.querySelectorAll('.save-btn');
const closeButtons = document.querySelectorAll('.close-btn');
const saveMessageModalBody = document.querySelector('#message-modal-body');

editButton.addEventListener('click', () => {
    modalBackground.classList.toggle('flex');
    modalBackground.classList.toggle('hidden');
    editModalBody.classList.toggle('hidden');
    editModalBody.classList.add('open');
    body.classList.add('overflow-hidden');
});

changePassword.addEventListener('click', () => {
    modalBackground.classList.toggle('flex');
    modalBackground.classList.toggle('hidden');
    changePasswordModalBody.classList.toggle('hidden');
    changePasswordModalBody.classList.add('open');
    body.classList.add('overflow-hidden');
});

// hide edit modal when save button is clicked
saveButtons.forEach(saveButton => {
    saveButton.addEventListener('click', () => {
        saveMessageModalBody.classList.toggle('hidden');
        saveMessageModalBody.classList.add('open');
    });
});

closeButtons.forEach(closeButton => {
    closeButton.addEventListener('click', () => {
        modalBackground.classList.toggle('flex');
        modalBackground.classList.toggle('hidden');
        modals.forEach(modal => {
            if (modal.classList.contains('open')) {
                modal.classList.remove('open');
                modal.classList.toggle('hidden');
            }
        });
        body.classList.remove('overflow-hidden');
    });
});



//SUCCESS or FAIL MESSAGE
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