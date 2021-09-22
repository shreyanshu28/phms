document
  .getElementById("modal-click")
  .addEventListener("click", function (event) {
    document.getElementById("modal").classList.add("is-active", "is-clipped");
  });

document
  .getElementById("close-modal")
  .addEventListener("click", function (event) {
    document
      .getElementById("modal")
      .classList.remove("is-active", "is-clipped");
  });

// document.getElementById("submit").addEventListener("click", function (event) {
//   document.getElementById("modal").classList.remove("is-active", "is-clipped");
// });
