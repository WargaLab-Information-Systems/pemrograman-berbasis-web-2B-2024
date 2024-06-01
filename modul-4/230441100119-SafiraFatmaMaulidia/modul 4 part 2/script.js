// Menunggu sampai seluruh dokumen HTML selesai dimuat
document.addEventListener('DOMContentLoaded', () => {
    // Mendapatkan elemen HTML dengan ID 'todo-form'
    const todoForm = document.getElementById('todo-form');
    // Mendapatkan elemen input dengan ID 'new-todo'
    const todoInput = document.getElementById('new-todo');
    // Mendapatkan elemen ul dengan ID 'todo-list'
    const todoList = document.getElementById('todo-list');

    // Mengambil data 'todos' dari localStorage dan mengonversinya menjadi array JavaScript, atau inisialisasi sebagai array kosong jika tidak ada
    let todos = JSON.parse(localStorage.getItem('todos')) || [];

    // Fungsi untuk merender daftar tugas
    const renderTodos = () => {
        // Mengosongkan daftar tugas
        todoList.innerHTML = '';
        // Melakukan iterasi pada array todos
        todos.forEach((todo, index) => {
            // Membuat elemen li baru untuk setiap tugas
            const li = document.createElement('li');
            // Menambahkan class 'completed' jika tugas sudah selesai
            li.className = todo.completed ? 'completed' : '';
            // Menambahkan HTML ke dalam elemen li
            li.innerHTML = `
                <span>${todo.text}</span>
                <div class="buttons">
                    <button class="complete">✓</button>
                    <button class="edit">✎</button>
                    <button class="delete">✗</button>
                </div>
            `;

            // Menambahkan event listener untuk tombol 'complete'
            li.querySelector('.complete').addEventListener('click', () => toggleComplete(index));
            // Menambahkan event listener untuk tombol 'edit'
            li.querySelector('.edit').addEventListener('click', () => editTask(index));
            // Menambahkan event listener untuk tombol 'delete'
            li.querySelector('.delete').addEventListener('click', () => deleteTask(index));

            // Menambahkan elemen li ke dalam ul todoList
            todoList.appendChild(li);
        });
        // Menyimpan array todos ke localStorage sebagai string JSON
        localStorage.setItem('todos', JSON.stringify(todos));
    };

    // Fungsi untuk menambahkan tugas baru
    const addTask = (text) => {
        // Menambahkan tugas baru ke array todos dengan properti text dan completed
        todos.push({ text, completed: false });
        // Merender ulang daftar tugas
        renderTodos();
    };

    // Fungsi untuk menghapus tugas berdasarkan indeks
    const deleteTask = (index) => {
        // Menghapus satu elemen dari array todos pada indeks tertentu
        todos.splice(index, 1);
        // Merender ulang daftar tugas
        renderTodos();
    };

    // Fungsi untuk mengubah status selesai tugas berdasarkan indeks
    const toggleComplete = (index) => {
        // Mengubah properti completed menjadi kebalikannya
        todos[index].completed = !todos[index].completed;
        // Merender ulang daftar tugas
        renderTodos();
    };

    // Fungsi untuk mengedit teks tugas berdasarkan indeks
    const editTask = (index) => {
        // Meminta input teks baru dari pengguna melalui prompt
        const newText = prompt('Edit your task:', todos[index].text);
        // Jika input teks baru tidak kosong, ubah teks tugas
        if (newText) {
            todos[index].text = newText;
            // Merender ulang daftar tugas
            renderTodos();
        }
    };

    // Menambahkan event listener untuk form saat disubmit
    todoForm.addEventListener('submit', (e) => {
        // Mencegah form dikirim secara default (yang akan memuat ulang halaman)
        e.preventDefault();
        // Mengambil nilai input dan menghapus spasi di sekitar
        const text = todoInput.value.trim();
        // Jika input tidak kosong, tambahkan tugas baru
        if (text !== '') {
            addTask(text);
            // Mengosongkan input setelah menambahkan tugas
            todoInput.value = '';
        }
    });

    // Merender ulang daftar tugas saat halaman dimuat
    renderTodos();
});
