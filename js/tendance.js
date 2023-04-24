const form = document.querySelector("form"),
  btn = form.querySelector("button");
form.addEventListener("submit", (e) =>
{
  e.preventDefault();
})
btn.addEventListener("click", (e) =>
{
  
  
})
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "functions/tendance.php", true);
  xhr.onload = () =>
  {
    if (xhr.readyState == XMLHttpRequest.DONE)
    {
      if (xhr.status == 200)
      {
        let data = xhr.response;

        }
      }
    }

}, 100);
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "functions/tendance.php", true);
  xhr.onload = () =>
  {
    if (xhr.readyState == XMLHttpRequest.DONE)
    {
      if (xhr.status == 200)
      {
        let data = xhr.response;
        
        
        }
      }
    }

}, 100);

