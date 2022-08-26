const registerForm = document.querySelector("#register-form");
const nameInput = document.querySelector("#name");
const nameError = document.querySelector("#name-error");
const dobInput = document.querySelector("#dob");
const dobError = document.querySelector("#dob-error");
const emailInput = document.querySelector("#email");
const emailError = document.querySelector("#email-error");
const passwordInput = document.querySelector("#password");
const passwordError = document.querySelector("#password-error");
const confirmPasswordInput = document.querySelector("#confirm-password")
const confirmPasswordError = document.querySelector("#confirm-password-error");

nameInput.isValid = () => !!nameInput.value;
dobInput.isValid = () => !!dobInput.value;
emailInput.isValid = () => isValidEmail(emailInput.value);
passwordInput.isValid = () => isValidPassword(passwordInput.value);
confirmPasswordInput.isValid = () => !!confirmPasswordInput.value && confirmPasswordInput.value == passwordInput.value;

const inputFields = [nameInput, dobInput, emailInput, passwordInput, confirmPasswordInput]

const isValidEmail = (email) => {
    const re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

const isValidPassword = (password) => {
    const re =
        /^(?!.*\s)(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹]).{8,}$/
    return re.test(password);
}

let shouldValidate = false;
let isFormValid = false;

const validateInputs = () => {
    if (!shouldValidate) return;

    isFormValid = true;
    inputFields.forEach((input) => {

        input.classList.remove("error");
        input.nextElementSibling.classList.add("hidden");

        if (!input.isValid()) {
            input.classList.add("error");
            isFormValid = false;
            input.nextElementSibling.classList.remove("hidden");
        }
    });
};

registerForm.addEventListener("submit", (e) => {
    e.preventDefault();
    shouldValidate = true;
    validateInputs();
    if (isFormValid) {
        //
    }
})

inputFields.forEach((input) => input.addEventListener("input", validateInputs));
