const modalClick = document.getElementById("modal-click");
const closeModal = document.getElementById("close-modal");

modalClick.addEventListener("click", function () {
  document.getElementById("modal").classList.add("is-active", "is-clipped");
});

closeModal.addEventListener("click", function (event) {
  document.getElementById("modal").classList.remove("is-active", "is-clipped");
});
