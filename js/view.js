let viewFormData = document.querySelector("#viewFormData");

function selectData() {
  fetch("php/select.php")
    .then((res) => res.json())
    .then((data) => {
      for (const item of data) {
        let singleItem = document.createElement("article");
        for (const prop in item) {
          let singleProp = document.createElement("section");
          singleProp.innerHTML = `${prop} : ${item[prop]}`;
          singleItem.appendChild(singleProp);
        }
        viewFormData.appendChild(singleItem);
      }
    });
}

// run once on page load
selectData();
