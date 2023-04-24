const table = document.querySelector(".table");
const logout = document.querySelector(".logout");
logout.addEventListener("click", () => {
  alert("Déconnexion???");
})
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "functions/admin2.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE)
    {
      if (xhr.status === 200)
      {
        let data = xhr.response;
        
        table.innerHTML = `${data}`;
        }
      }
  }
  xhr.send();
},2000);