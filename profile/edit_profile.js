var openedit = document.getElementById("open-modal-edit");
var closeedit = document.getElementById("close-modal-edit");
var edit_modal = document.getElementById("edit-modal");
var edit_backdrop = document.getElementById("edit-backdrop");

openedit.onclick = function () {
  edit_modal.style.display = "block";
  edit_backdrop.style.display = "block";
}
closeedit.onclick = function () {
  edit_modal.style.display = "none";
  edit_backdrop.style.display = "none";
}


// change password

var openchange = document.getElementById("open-modal-change");
var closechange = document.getElementById("close-modal-change");
var changemodal = document.getElementById("change-modal");
var change_backdrop = document.getElementById("change-backdrop");

openchange.onclick = function () {
  changemodal.style.display = "block";
  change_backdrop.style.display = "block";
}
closechange.onclick = function () {
  changemodal.style.display = "none";
  change_backdrop.style.display = "none";
}
