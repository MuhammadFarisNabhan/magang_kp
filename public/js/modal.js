let modal = document.getElementById('modal-message')

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    // modal.style.display = "block";
}