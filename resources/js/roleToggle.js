const roleInput = document.querySelector('#role-input');
const birthdayField = document.querySelector('#birthday-field');
const mainContainer = document.querySelector('#main-container');

const specializations = {
    s1: 'Pediatrics',
    s2: 'Geriatrics',
    s3: 'Orthopedics',
    s4: 'Anesthesiology',
    s5: 'Cardiology',
    s6: 'Dermatology',
    s7: 'Urology',
    s8: 'Neurology',
    s9: 'Radiology',
    s10: 'Other',
};

const barangays = {
    b1: "Burak",
    b2: "Canmogsay",
    b3: "Cantariwis",
    b4: "Capangihan",
    b5: "Doña Brigida",
    b6: "Imelda",
    b7: "Malbog",
    b8: "Olot",
    b9: "Opong",
    b10: "Poblacion",
    b11: "Quilao",
    b12: "San Roque",
    b13: "San Vicente",
    b14: "Tanghas",
    b15: "Telegrafo"
};

// Function to create a field with label and select element
function createField(id, labelName, selectOptions) {
    const field = document.createElement('div');
    field.id = id;
    field.classList.add('flex-wrap', 'items-center', 'md:grid', 'md:grid-cols-12', 'w-full');

    const label = document.createElement('label');
    label.classList.add('md:col-span-2', 'whitespace-nowrap')
    label.innerHTML = labelName;
    field.append(label);

    const select = document.createElement('select');
    select.id = `${id}-select`;
    select.name = labelName.toLowerCase();
    select.classList.add('optional-select', 'form-input', 'md:col-start-4', 'md:col-span-10');
    select.setAttribute('required', true);
    field.append(select);

    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.text = `Select ${labelName}`;
    defaultOption.hidden = true;
    select.appendChild(defaultOption);

    // Add options to the select element
    selectOptions.forEach(function(optionValue) {
        const option = document.createElement('option');
        option.value = optionValue;
        option.text = optionValue;
        select.append(option);
    });

    return field;
}

// Event listener for role input change
roleInput.addEventListener('change', () => {
    let specializationField = document.getElementById("specialization-field");
    let barangayField = document.getElementById("barangay-field");

    if (roleInput.value === "Admin") {
        // Remove the specialization field if it exists
        if (specializationField) {
            specializationField.remove();
        }
        // Remove the barangay field if it exists
        if (barangayField) {
            barangayField.remove();
        }
    } else {
        if (roleInput.value === "Doctor" && !specializationField) {
            if (barangayField) {
                barangayField.remove();
            }
            // Create specialization field and insert it before the birthday field
            specializationField = createField("specialization-field", "Specialization", Object.values(specializations));
            mainContainer.insertBefore(specializationField, birthdayField);
        } else if (!barangayField) {
            if (specializationField) {
                specializationField.remove();
            }
            // Create barangay field and insert it before the birthday field
            barangayField = createField("barangay-field", "Barangay", Object.values(barangays));
            mainContainer.insertBefore(barangayField, birthdayField);
        }
    }
});