const form = document.querySelector("form"),
  btn = form.querySelector("button"),
  text = form.querySelector("h3");
form.addEventListener("submit", (e) => {
  e.preventDefault();
});
btn.addEventListener("click", (e) => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "functions/inscription.php", true);
  xhr.onload = () => {
    if ((xhr.readyState = XMLHttpRequest.DONE)) {
      if (xhr.status == 200) {
        let data = xhr.response;
        if (data == "success") {
          location.href = "tendance.php";
        } else {
          text.innerHTML = data;
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
});
