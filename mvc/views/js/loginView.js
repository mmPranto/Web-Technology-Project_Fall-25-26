function validateLogin() {
    let username = document.getElementById("uname").value.trim();
    let password = document.getElementById("password").value.trim();

    let valid = true;

    document.querySelectorAll(".error").forEach(e => e.innerText = "");

    if (username === "") {
        document.querySelectorAll(".error")[0].innerText = "Username required";
        valid = false;
    }

    if (password === "") {
        document.querySelectorAll(".error")[1].innerText = "Password required";
        valid = false;
    }

    return valid; 
}