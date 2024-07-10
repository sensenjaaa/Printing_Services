var modalBtns = document.getElementsByClassName("modalBtn");
var modals = document.getElementsByClassName("modalContainer");

var spans = document.getElementsByClassName("close");

for (var i = 0; i < modalBtns.length; i++) {
    modalBtns[i].onclick = function() {
        var modal = this.nextElementSibling;
        modal.style.display = "block";
    }
}

for (var i = 0; i < spans.length; i++) {
    spans[i].onclick = function() {
        var modal = this.parentElement.parentElement;
        modal.style.display = "none";
    }
}

window.onclick = function(event) {
    for (var i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
}
