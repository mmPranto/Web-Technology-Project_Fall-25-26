document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("regForm");
  const uname = document.getElementById("uname");
  const email = document.getElementById("email");

  // Ajax check for Username and Email
  const checkUnique = (input, field, statusId) => {
    input.addEventListener("blur", function () {
      if (this.value.length < 3) return;
      fetch("../controllers/ajaxCheck.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `field=${field}&value=${encodeURIComponent(this.value)}`,
      })
        .then((res) => res.json())
        .then((data) => {
          const status = document.getElementById(statusId);
          status.innerHTML = data.available ? "✓ Available" : "✗ Already taken";
          status.className =
            "ajax-status " + (data.available ? "available" : "taken");
        });
    });
  };

  checkUnique(uname, "uname", "uname-status");
  checkUnique(email, "email", "email-status");

  // Final Validation on Submit
  form.addEventListener("submit", function (e) {
    let pass = document.getElementById("password").value;
    let conPass = document.getElementById("con-pass").value;

    if (pass !== conPass) {
      alert("Passwords do not match!");
      e.preventDefault();
    }
  });
});
