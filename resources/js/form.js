// VIEW USER JS
const userTitle = document.getElementById('userTitle');
const editButton = document.getElementById('editButton');
const closeButton = document.getElementById('closeButton');
const inputFields = document.querySelectorAll('input[name][disabled]');
const userForm = document.getElementById('userForm');
const editing = document.getElementById('editing');

userForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission behavior
});

function checkFieldsDisabled() {
    let allDisabled = true;
    inputFields.forEach(function(field) {
      if (!field.disabled) {
        allDisabled = false;
      }
    });
    return allDisabled;
}

editButton.addEventListener('click', function() {
    if (editButton.textContent === 'Edit') {
        inputFields.forEach(function(field) {
            field.removeAttribute('disabled');
            field.classList.remove('bg-disabled-bg');
            field.classList.add('bg-white');
        });

        editing.setAttribute("value", true);
        userTitle.textContent = 'Edit User Information';
        closeButton.textContent = 'Cancel';
        editButton.textContent = 'Save';
    }
    else if (editButton.textContent === 'Save') {
        if (validationPassed === 'true') {
            userForm.submit();
        }
        
    }
});

closeButton.addEventListener('click', function() {
  if (closeButton.textContent === 'Cancel') {
    inputFields.forEach(function(field) {
      field.setAttribute('disabled', 'disabled');
      field.classList.remove('bg-white');
      field.classList.add('bg-disabled-bg');
    });

    userTitle.textContent = 'User Information';
    closeButton.textContent = 'Close';
    editButton.textContent = 'Edit';
  } 
  else if (closeButton.textContent === 'Close' && checkFieldsDisabled()) {
    window.location.href = '/users'; // Redirect to '/users'
  }
});
// VIEW USER JS