// metode DOM (Document Object Model) yang digunakan untuk mengambil semua elemen dengan kelas yang ditentukan.
       var dropdown = document.getElementsByClassName("dropdown");

// loop for yang akan berjalan melalui setiap elemen dropdown yang telah ditemukan dalam langkah sebelumnya.
        for (var i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.getElementsByClassName("dropdown-content")[0];
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }