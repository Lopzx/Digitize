// Validasi Email (Interested Yet)
function validateEmail(e) {
    e.preventDefault();

    let emailForm = document.querySelector("#email-form");
    let emailInput = document.querySelector("#email");
    let emailError = document.querySelector("#email-error");
    let emailErrorMessage = document.querySelector("#email-error-message")

    // Validasi Email
    const reEmail =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (emailInput.value == "") {
        emailError.classList.remove("hidden");
        emailErrorMessage.innerHTML = "Email is required"
    } else if (!emailInput.value.match(reEmail)) {
        emailError.classList.remove("hidden");
        emailErrorMessage.innerHTML = "Email is invalid"
    } else {
        emailError.classList.add("hidden");
    }

    // Submit
    if (
        emailInput.value != "" &&
        emailInput.value.match(reEmail)
    ) {
        emailForm.submit();
    }
}

// Validasi Contact Us Form
function validateContact(e) {
    e.preventDefault();

    let contacForm = document.querySelector("#contact-form");
    let contactName = document.querySelector("#contact-name");
    let contactNameError = document.querySelector("#contact-name-error");
    let contactEmail = document.querySelector("#contact-email");
    let contactEmailError = document.querySelector("#contact-email-error");
    let contactEmailErrorMessage = document.querySelector("#contact-email-error-message");
    let contactMessage = document.querySelector("#contact-message");
    let contactMessageError = document.querySelector("#contact-message-error");

    // Validasi Name
    if (contactName.value == "") {
        contactName.classList.add("error");
        contactNameError.classList.remove("hidden");
    } else {
        contactName.classList.remove("error");
        contactNameError.classList.add("hidden")
    }

    // Validasi Email
    const reContactEmail =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (contactEmail.value == "") {
        contactEmail.classList.add("error");
        contactEmailError.classList.remove("hidden");
        contactEmailErrorMessage.innerHTML = "Email is required"
    } else if (!contactEmail.value.match(reContactEmail)) {
        contactEmail.classList.add("error");
        contactEmailError.classList.remove("hidden");
        contactEmailErrorMessage.innerHTML = "Email is invalid"
    } else {
        contactEmail.classList.remove("error");
        contactEmailError.classList.add("hidden");
        contactEmailErrorMessage.classList.add("hidden");
    }

    // Validasi Message
    if (contactMessage.value == "") {
        contactMessage.classList.add("error");
        contactMessageError.classList.remove("hidden");
    } else {
        contactMessage.classList.remove("error");
        contactMessageError.classList.add("hidden")
    }

    // Submit
    if (
        contactName.value != "" &&
        contactEmail.value != "" &&
        contactEmail.value.match(reContactEmail) &&
        contactMessage.value != ""
    ) {
        contacForm.submit();
    }
}
