
function validateInputs (e) {
    e.preventDefault();

    let loginForm = document.querySelector("#login-form");
    let emailInput = document.querySelector("#email");
    let emailValue = emailInput.value;
    let emailError = document.querySelector("#email-error");
    let passwordInput = document.querySelector("#password");
    let passwordValue = passwordInput.value;
    let passwordError = document.querySelector("#password-error");

    // Validasi Email
    const reEmail =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (emailValue == "") {
        emailInput.classList.add("error");
        emailInput.nextElementSibling.classList.remove("hidden");
        emailError.innerHTML = "Email is required"
    } else if (!emailValue.match(reEmail)) {
        emailInput.classList.add("error");
        emailInput.nextElementSibling.classList.remove("hidden");
        emailError.innerHTML = "Email is invalid"
    } else {
        emailInput.classList.remove("error");
        emailInput.nextElementSibling.classList.add("hidden");
    }

    // Validasi Password
    const rePassword =
    /^(?!.*\s)(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹]).{8,}$/

    if (passwordValue == "") {
        passwordInput.classList.add("error");
        passwordInput.nextElementSibling.classList.remove("hidden");
        passwordError.innerHTML = "Password is required"
    } else if (!passwordValue.match(rePassword)) {
        passwordInput.classList.add("error");
        passwordInput.nextElementSibling.classList.remove("hidden");
        passwordError.innerHTML = "Password is invalid"
    } else {
        passwordInput.classList.remove("error");
        passwordInput.nextElementSibling.classList.add("hidden");
    }

    // Submit
    if (
        emailValue != "" &&
        emailValue.match(reEmail) &&
        passwordValue != "" &&
        passwordValue.match(rePassword)
    ) {
        loginForm.submit();
    }
};
