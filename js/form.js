let webform = document.querySelector("#webform");

webform.addEventListener("submit", (event) => {
  event.preventDefault();

  const webFormData = new FormData(webform);
  fetch("php/insert.php", { body: webFormData, method: "POST" })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
    });
});
