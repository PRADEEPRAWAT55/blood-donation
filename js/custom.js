if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
