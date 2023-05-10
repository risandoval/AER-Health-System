const body = document.querySelector('body')
const modalBackground = document.querySelector('#modal-background');
const modals = document.querySelectorAll('.modal');
const editButtons = document.querySelectorAll('#edit');
const editModalBody = document.querySelector('#edit-modal-body');
const archiveButtons = document.querySelectorAll('#archive');
const archiveModalBody = document.querySelector('#archive-modal-body');
const closeButtons = document.querySelectorAll('.close-btn');

// opens edit modal
editButtons.forEach(editButton => {
    editButton.addEventListener('click', () => {
        modalBackground.classList.toggle('flex');
        modalBackground.classList.toggle('hidden');
        editModalBody.classList.toggle('hidden');
        editModalBody.classList.add('open');
        body.classList.add('overflow-hidden');
    });
});

archiveButtons.forEach(archiveButton => {
    archiveButton.addEventListener('click', () => {
        modalBackground.classList.toggle('flex');
        modalBackground.classList.toggle('hidden');
        archiveModalBody.classList.toggle('hidden');
        archiveModalBody.classList.add('open');
        body.classList.add('overflow-hidden');
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

