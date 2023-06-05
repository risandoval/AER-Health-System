const body = document.querySelector('body')
const modalBackground = document.querySelector('#modal-background');
const modals = document.querySelectorAll('.modal');
const editButton = document.querySelector('#edit');
const editModalBody = document.querySelector('#edit-modal-body');
const changePassword = document.querySelector('#change-password');
const changePasswordModalBody = document.querySelector('#change-password-modal-body');
const saveButtons = document.querySelectorAll('#save');
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

// hide edit modal when save button is clicked then open save message modal
saveButtons.forEach(saveButton => {
    saveButton.addEventListener('click', () => {
        modals.forEach(modal => {
            if (modal.classList.contains('open')) {
                modal.classList.remove('open');
                modal.classList.toggle('hidden');
            }
        });
        saveMessageModalBody.classList.toggle('hidden');
        saveMessageModalBody.classList.add('open');
    });
});

// closes modal when clicked outside
modalBackground.addEventListener('click', (e) => { 
    if (e.target == modalBackground) {
        modalBackground.classList.toggle('flex');
        modalBackground.classList.toggle('hidden');
        modals.forEach(modal => {
            if (modal.classList.contains('open')) {
                modal.classList.remove('open');
                modal.classList.toggle('hidden');
            }
        });
        body.classList.remove('overflow-hidden');
    }
    e.stopPropagation();
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