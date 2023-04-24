setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "functions/votes.php", true);
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