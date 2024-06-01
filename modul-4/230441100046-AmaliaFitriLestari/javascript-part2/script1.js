// fungsi mydropdown untuk menampilkan atau menyembunyikan link dropdown
function klikDropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (event.target.matches('.dropbtn')) {
        var myDropdown = document.getElementsById("myDropdown");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
