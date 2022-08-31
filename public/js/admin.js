// Add Popup
let addPopup = document.querySelector("#add-popup");
let addBtn = document.querySelector("#add-btn");
let addClose = document.querySelector("#add-close");

addBtn.onclick = function () {
    addPopup.classList.remove("hidden");
};
addClose.onclick = function () {
    addPopup.classList.add("hidden");
}

// Edit Popup
let editPopup = document.querySelector("#edit-popup");
let editBtn = document.querySelector("#edit-btn");
let editClose = document.querySelector("#edit-close");

editBtn.onclick = function () {
    editPopup.classList.remove("hidden");
};
editClose.onclick = function () {
    editPopup.classList.add("hidden");
}

// Delete Popup
let deletePopup = document.querySelector("#delete-popup");
let deleteBtn = document.querySelector("#delete-btn");
let deleteCancel = document.querySelector("#delete-cancel");
let deleteConfirm = document.querySelector("#delete-confirm");

deleteBtn.onclick = function () {
    deletePopup.classList.remove("hidden");
};
deleteCancel.onclick = function () {
    deletePopup.classList.add("hidden");
}

// Add Participant Validation
const addForm = document.querySelector("#add-form");
const addNameInput = document.querySelector("#add-name");
const addNameError = document.querySelector("#add-name-error");
const addDobInput = document.querySelector("#add-dob");
const addDobError = document.querySelector("#add-dob-error");
const addEmailInput = document.querySelector("#add-email");
const addEmailError = document.querySelector("#add-email-error");
const addCategoryInput = document.querySelector("#add-category");
const addCategoryError = document.querySelector("#add-category-error")
const addFileInput = document.querySelector("#add-file");
const addFileError = document.querySelector("#add-file-error");

addNameInput.isValid = () => !!addNameInput.value;
addDobInput.isValid = () => !!addDobInput.value;
addEmailInput.isValid = () => isValidEmail(addEmailInput.value);
addCategoryInput.isValid = () => !!addCategoryInput.value;
addFileInput.isValid = () => !!addFileInput.value;

const addInputFields = [addNameInput, addDobInput, addEmailInput, addCategoryInput, addFileInput]

const isValidEmail = (email) => {
    const re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

let addShouldValidate = false;
let addIsFormValid = false;

const addValidateInputs = () => {
    if (!addShouldValidate) return;

    addIsFormValid = true;
    addInputFields.forEach((input) => {

        input.classList.remove("error");
        input.nextElementSibling.classList.add("hidden");

        if (!input.isValid()) {
            input.classList.add("error");
            addIsFormValid = false;
            input.nextElementSibling.classList.remove("hidden");
        }
    });
};

addForm.addEventListener("submit", (e) => {
    e.preventDefault();
    addShouldValidate = true;
    addValidateInputs();
    if (addIsFormValid) {
        addForm.submit()
    }
})

addInputFields.forEach((input) => input.addEventListener("input", addValidateInputs));


// Edit Participant
const editForm = document.querySelector("#edit-form");
const editNameInput = document.querySelector("#edit-name");
const editNameError = document.querySelector("#edit-name-error");
const editDobInput = document.querySelector("#edit-dob");
const editDobError = document.querySelector("#edit-dob-error");
const editEmailInput = document.querySelector("#edit-email");
const editEmailError = document.querySelector("#edit-email-error");
const editCategoryInput = document.querySelector("#edit-category");
const editCategoryError = document.querySelector("#edit-category-error")
const editFileInput = document.querySelector("#edit-file");
const editFileError = document.querySelector("#edit-file-error");

editNameInput.isValid = () => !!editNameInput.value;
editDobInput.isValid = () => !!editDobInput.value;
editEmailInput.isValid = () => isValidEmail(editEmailInput.value);
editCategoryInput.isValid = () => !!editCategoryInput.value;
editFileInput.isValid = () => !!editFileInput.value;

const editInputFields = [editNameInput, editDobInput, editEmailInput, editCategoryInput, editFileInput]

let editShouldValidate = false;
let editIsFormValid = false;

const editValidateInputs = () => {
    if (!editShouldValidate) return;

    editIsFormValid = true;
    editInputFields.forEach((input) => {

        input.classList.remove("error");
        input.nextElementSibling.classList.add("hidden");

        if (!input.isValid()) {
            input.classList.add("error");
            editIsFormValid = false;
            input.nextElementSibling.classList.remove("hidden");
        }
    });
};

editForm.addEventListener("submit", (e) => {
    e.preventDefault();
    editShouldValidate = true;
    editValidateInputs();
    if (editIsFormValid) {
        addForm.submit()
    }
})

editInputFields.forEach((input) => input.addEventListener("input", editValidateInputs));
