var modal = document.getElementById("classForm");
var classFormBtn = document.getElementById("addForm");
var span = document.getElementsByClassName("close")[0];

classFormBtn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }   
}
