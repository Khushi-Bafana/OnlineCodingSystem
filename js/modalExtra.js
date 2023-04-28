var modal = document.getElementById("classForm");
var span = document.getElementsByClassName("close")[0];

/*classFormBtn.onclick = function() {
    console.log("clicked");
    //document.getElementById('_name').value = document.getElementById('classNameFT').textContent;
    modal.style.display = "block";
}*/

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }   
}
