// VIEW USER JS
const userTitle = document.getElementById('userTitle');
const editButton = document.getElementById('editButton');
const closeButton = document.getElementById('closeButton');
const inputFields = document.querySelectorAll('input');
const roleInput = document.querySelector('#role-input');
const userForm = document.getElementById('userForm');

userForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission behavior
});

editButton.addEventListener('click', function() {
    if (editButton.textContent === 'Edit') {
        inputFields.forEach(function (inputField) {
          if (inputField.readOnly == false) {
            inputField.removeAttribute('disabled');
          }
        });

        if(roleInput.value != 'Admin') {
          const displayInput = document.querySelector('.display-input');
          const selectField = document.querySelector('select'); 
          
          displayInput.setAttribute('hidden', true);
          selectField.removeAttribute('disabled');
          selectField.removeAttribute('hidden')
        }

        userTitle.textContent = 'Edit User Information';
        closeButton.textContent = 'Cancel';
        editButton.textContent = 'Save';
    }
    else if (editButton.textContent === 'Save') {
      userForm.submit();
    }
});

closeButton.addEventListener('click', function() {
  if (closeButton.textContent === 'Cancel') {
    location.reload();
  } 
  else if (closeButton.textContent === 'Close') {
    window.location.href = '/users'; // Redirect to '/users'
  }
});
// VIEW USER JS