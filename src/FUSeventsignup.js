
window.addEventListener('load', init);

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

function init() {
    document.getElementById("radio").style.display ="none";
    document.getElementById('check').addEventListener('change', open);

    document.getElementById("otherDates").style.display ="none"
    document.getElementById('other').addEventListener('change', open2);

    document.getElementById('btn').addEventListener('click', add);
}

function other(){
    alert('hello');
}

function open() {
    if (this.checked) {
        document.getElementById("radio").style.display = "block";
    } 
    else {
        document.getElementById("radio").style.display = "none";
    }
}
function open2() {
    if (this.checked) {
        document.getElementById("otherDates").style.display = "block";
    } 
    else {
        document.getElementById("otherDates").style.display = "none";
    }
}

function add(){
    document.getElementById("otherDates").insertAdjacentHTML('afterbegin', '<p>Select date and start time: <br><input type="datetime-local"/><br>'
    +'Select end time: <br><input type="time"/></p>')
}