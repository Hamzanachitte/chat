const form = document.querySelector(".reset-password form");
const resetBtn = form.querySelector(".button input");
const errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
  e.preventDefault();
};

resetBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/reset_password.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
          // Redirect to a success page or display a success message.
          location.href = "reset_password_success.php";
        } else {
          errorText.style.display = "block";
          errorText.textContent = data;
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};
