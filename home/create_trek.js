var openBtn = document.getElementById("open-modal");
var closeBtn = document.getElementById("close-modal");
var modal = document.getElementById("modal");
var backdrop = document.getElementById("backdrop");

openBtn.onclick = function () {
  modal.style.display = "block";
  backdrop.style.display = "block";
}
closeBtn.onclick = function () {
  modal.style.display = "none";
  backdrop.style.display = "none";
}