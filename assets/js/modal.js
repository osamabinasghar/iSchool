// Admin Modal
// Get the modal
var modalAdmin = document.getElementById("adminModal");
// Get the button that opens the modal
var btnAdmin = document.getElementById("btnAdmin");
// Get the <span> element that closes the modal
var spanAdmin = document.getElementsByClassName("closeAdmin")[0];
// When the user clicks the button, open the modal 
btnAdmin.onclick = function() {
  modalAdmin.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
spanAdmin.onclick = function() {
  modalAdmin.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalAdmin) {
    modalAdmin.style.display = "none";
  }
}

// Teacher Modal
// Get the modal
var modalTeacher = document.getElementById("teacherModal");
// Get the button that opens the modal
var btnTeacher = document.getElementById("btnTeacher");
// Get the <span> element that closes the modal
var spanTeacher = document.getElementsByClassName("closeTeacher")[0];
// When the user clicks the button, open the modal 
btnTeacher.onclick = function() {
  modalTeacher.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
spanTeacher.onclick = function() {
  modalTeacher.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalTeacher) {
    modalTeacher.style.display = "none";
  }
}

// Student Modal
// Get the modal
var modalStudent = document.getElementById("studentModal");
// Get the button that opens the modal
var btnStudent = document.getElementById("btnStudent");
// Get the <span> element that closes the modal
var spanStudent = document.getElementsByClassName("closeStudent")[0];
// When the user clicks the button, open the modal 
btnStudent.onclick = function() {
  modalStudent.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
spanStudent.onclick = function() {
  modalStudent.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalStudent) {
    modalStudent.style.display = "none";
  }
}

// Parents Modal
// Get the modal
var modalParent = document.getElementById("parentModal");
// Get the button that opens the modal
var btnParent = document.getElementById("btnParent");
// Get the <span> element that closes the modal
var spanParent = document.getElementsByClassName("closeParent")[0];
// When the user clicks the button, open the modal 
btnParent.onclick = function() {
  modalParent.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
spanParent.onclick = function() {
  modalParent.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalParent) {
    modalParent.style.display = "none";
  }
}