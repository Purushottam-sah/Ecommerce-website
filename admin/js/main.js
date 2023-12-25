const check = document.querySelector(".authentication");
const checkitem = document.querySelector(".admin-authenticate");

check.addEventListener("click", () => {
  if (checkitem.style.display === "block") {
    checkitem.style.display = "none";
  } else {
    checkitem.style.display = "block";
  }
});

const componentsList = document.querySelector(".components");
const compItems = document.querySelector(".component-list");

componentsList.addEventListener("click", () => {
  if (compItems.style.display === "block") {
    compItems.style.display = "none";
  } else {
    compItems.style.display = "block";
  }
});

const liLevel = document.querySelector(".level-list");
const ulItems = document.querySelector(".level-items");

liLevel.addEventListener("click", () => {
  if (ulItems.style.display === "block") {
    ulItems.style.display = "none";
  } else {
    ulItems.style.display = "block";
  }
});

const sidebar = document.querySelector(".sidebar");
const toggleBar = document.querySelector(".bx-menu");

toggleBar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
  mainContent.classList.toggle("full-width");
});




