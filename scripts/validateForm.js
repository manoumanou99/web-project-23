function validateForm() {
    var password = document.getElementById("password").value;
    var passwordError = document.getElementById("password-error");

    // Regular expressions to match password requirements
    var regexUpper = /[A-Z]/;
    var regexNumber = /[0-9]/;
    var regexSymbol = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

    if (password.length < 8 || !regexUpper.test(password) || !regexNumber.test(password) || !regexSymbol.test(password)) {
        passwordError.innerText = "Password must be at least 8 characters with at least one uppercase letter, one number, and one symbol.";
        return false;
    } else {
        passwordError.innerText = "";
        return true;
    }
}