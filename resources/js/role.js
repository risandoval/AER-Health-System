const roleInput = document.querySelector('#role-input');
const specializationInput = document.querySelector('#specialization-input');
let roleValue = roleInput.value;

window.addEventListener('load', () => {
    if (roleValue === 'Admin') {
        specializationInput.setAttribute("hidden", true);
        specializationInput.previousElementSibling.setAttribute("hidden", true);
    }
});

roleInput.addEventListener('change', (e) => {
    if (roleValue === 'Admin') {
        
    }
});