// applied in password field (login, current pass)
const passwordToggle = document.querySelector('.js-password-toggle')

passwordToggle.addEventListener('change', function() {
  const password = document.querySelector('.js-password'),
    passwordLabel = document.querySelector('.js-password-label')

  if (password.type === 'password') {
    password.type = 'text'
    passwordLabel.innerHTML = 'Hide'
  } else {
    password.type = 'password'
    passwordLabel.innerHTML = 'Show'
  }

  password.focus()
})

//applied in new password
const newPasswordToggle = document.querySelector('#new_password_toggle');
const newPasswordInput = document.querySelector('#new_password');
const newPasswordLabel = document.querySelector('#new_password_label');

newPasswordToggle.addEventListener('click', function () {
  if (newPasswordInput.type === 'password') {
    newPasswordInput.type = 'text';
    newPasswordLabel.innerHTML = 'Hide';
  } else {
    newPasswordInput.type = 'password';
    newPasswordLabel.innerHTML = 'Show';
  }

  newPasswordInput.focus();
});

//applied in confirm password
const confirmPasswordToggle = document.querySelector('#confirm_password_toggle');
const confirmPasswordInput = document.querySelector('#confirm_password');
const confirmPasswordLabel = document.querySelector('#confirm_password_label');

confirmPasswordToggle.addEventListener('click', function () {
    if (confirmPasswordInput.type === 'password') {
        confirmPasswordInput.type = 'text';
        confirmPasswordLabel.innerHTML = 'Hide';
    } else {
        confirmPasswordInput.type = 'password';
        confirmPasswordLabel.innerHTML = 'Show';
    }
    
    confirmPasswordInput.focus();
    }
);


