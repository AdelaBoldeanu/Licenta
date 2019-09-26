// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function myFunction() {
  alert("In cazul in care ati uitat Numele de utilizator, va rugam sa anuntati administratorul aplicatiei!");
}
function SecondFunction() {
  alert("In cazul in care ati uitat parola, va rugam sa anuntati administratorul aplicatiei!");
}