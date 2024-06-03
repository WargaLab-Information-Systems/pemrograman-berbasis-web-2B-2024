// Mendapatkan elemen dropdown
const dropdownBtn = document.querySelector('.dropdown-btn');
const dropdownContent = document.querySelector('.dropdown-content');

// Fungsi untuk menampilkan/menyembunyikan dropdown
function toggleDropdown() {
  dropdownContent.classList.toggle('show');
}

// Menambahkan event listener pada tombol dropdown
dropdownBtn.addEventListener('click', toggleDropdown);

// Menyembunyikan dropdown saat mengklik di luar area dropdown
window.addEventListener('click', function(event) {
  if (!event.target.matches('.dropdown-btn')) {
    if (dropdownContent.classList.contains('show')) {
      dropdownContent.classList.remove('show');
    }
  }
});



//web todo//
const form = document.querySelector("form");
const inputUser = document.getElementById("input-user");
const ListGroup = document.querySelector(".ListGroup");

form.addEventListener("submit",function(Event){
    
    ListGroup.innerHTML = `
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <h3>${inputUser.value}</h3><span class="fs-3"><i class="bi bi-x-square-fill text-danger"></i></span>
        </li>    
    `
    Event.preventDefault();
})
