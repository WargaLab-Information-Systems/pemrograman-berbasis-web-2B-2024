const tombolDropdown = document.getElementById("tombol");
const dropdownMenu = document.getElementById("dropdown");
const togglePanah = document.getElementById("panah");
const toggleDropdown = function () {
  dropdownMenu.classList.toggle("tampilkan");
  togglePanah.classList.toggle("panah");
};
tombolDropdown.addEventListener("click", function (e) {
  e.stopPropagation();
  toggleDropdown();
});
document.documentElement.addEventListener("click", function () {
  if (dropdownMenu.classList.contains("tampilkan")) {
    toggleDropdown();
  }
});