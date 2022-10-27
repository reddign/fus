function Function() {
    document.getElementById("Dropdown").classList.toggle("show");
}
function Function2() {
    document.getElementById("Dropdown2").classList.toggle("show");
}
function Function3() {
    document.getElementById("Dropdown3").classList.toggle("show");
}
  
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}