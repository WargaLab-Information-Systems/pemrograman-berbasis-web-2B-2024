// Mendapatkan elemen-elemen yang diperlukan
const taskInput = document.getElementById('taskInput');
const taskList = document.getElementById('taskList');
const loadTasksBtn = document.getElementById('loadTasksBtn');

// Fungsi untuk menambahkan tugas baru
function addTask() {
    const taskText = taskInput.value.trim();
    if (taskText === '') {
        alert('Mohon masukkan teks untuk tugas!');
        return;
    }

    const taskItem = document.createElement('li');
    taskItem.classList.add('task-item');
    taskItem.innerHTML = `
        <span>${taskText}</span>
        <button class="editBtn">Ubah</button>
        <button class="deleteBtn">Hapus</button>
        <button class="doneBtn">Selesai</button>
    `;
    taskList.appendChild(taskItem);

    taskInput.value = ''; // Kosongkan input setelah tugas ditambahkan

    // Tambahkan event listener untuk tombol hapus
    const deleteBtn = taskItem.querySelector('.deleteBtn');
    deleteBtn.addEventListener('click', () => {
        taskItem.remove();
        saveTasks(); // Simpan list tugas setelah menghapus
    });

    // Tambahkan event listener untuk tombol selesai
    const doneBtn = taskItem.querySelector('.doneBtn');
    doneBtn.addEventListener('click', () => {
        taskItem.classList.toggle('done');
        if (taskItem.classList.contains('done')) {
            doneBtn.textContent = 'Batal';
            doneBtn.classList.add('done');
        } else {
            doneBtn.textContent = 'Selesai';
            doneBtn.classList.remove('done');
        }
        saveTasks(); // Simpan list tugas setelah menandai selesai atau batal
    });

    // Tambahkan event listener untuk tombol ubah
    const editBtn = taskItem.querySelector('.editBtn');
    editBtn.addEventListener('click', () => {
        const newText = prompt('Masukkan teks baru untuk tugas:', taskText);
        if (newText !== null) {
            taskItem.querySelector('span').textContent = newText.trim();
            saveTasks(); // Simpan list tugas setelah mengubah
        }
    });

    saveTasks(); // Simpan list tugas setiap kali menambahkan tugas baru
}

// Tambahkan event listener untuk tombol tambah
addTaskBtn.addEventListener('click', addTask);

// Tambahkan event listener untuk tombol muat list tugas
loadTasksBtn.addEventListener('click', () => {
    const tasks = JSON.parse(localStorage.getItem('tasks')) || [];
    taskList.innerHTML = ''; // Kosongkan daftar tugas sebelum memuat yang baru
    tasks.forEach(task => {
        const taskItem = document.createElement('li');
        taskItem.classList.add('task-item');
        taskItem.innerHTML = `
            <span>${task.text}</span>
            <button class="editBtn">Ubah</button>
            <button class="deleteBtn">Hapus</button>
            <button class="doneBtn">Selesai</button>
        `;
        if (task.done) {
            taskItem.classList.add('done');
            taskItem.querySelector('.doneBtn').textContent = 'Batal';
            taskItem.querySelector('.doneBtn').classList.add('done');
        }
        taskList.appendChild(taskItem);

        // Tambahkan event listener untuk tombol hapus
        const deleteBtn = taskItem.querySelector('.deleteBtn');
        deleteBtn.addEventListener('click', () => {
            taskItem.remove();
            saveTasks(); // Simpan list tugas setelah menghapus
        });

        // Tambahkan event listener untuk tombol selesai
        const doneBtn = taskItem.querySelector('.doneBtn');
        doneBtn.addEventListener('click', () => {
            taskItem.classList.toggle('done');
            if (taskItem.classList.contains('done')) {
                doneBtn.textContent = 'Batal';
                doneBtn.classList.add('done');
            } else {
                doneBtn.textContent = 'Selesai';
                doneBtn.classList.remove('done');
            }
            saveTasks(); // Simpan list tugas setelah menandai selesai atau batal
        });

        // Tambahkan event listener untuk tombol ubah
        const editBtn = taskItem.querySelector('.editBtn');
        editBtn.addEventListener('click', () => {
            const newText = prompt('Masukkan teks baru untuk tugas:', task.text);
            if (newText !== null) {
                taskItem.querySelector('span').textContent = newText.trim();
                saveTasks(); // Simpan list tugas setelah mengubah
            }
        });
    });
});

// Simpan list tugas ke local storage
function saveTasks() {
    const tasks = [];
    taskList.querySelectorAll('.task-item').forEach(taskItem => {
        tasks.push({
            text: taskItem.querySelector('span').textContent,
            done: taskItem.classList.contains('done')
        });
    });
    localStorage.setItem('tasks', JSON.stringify(tasks));
}
