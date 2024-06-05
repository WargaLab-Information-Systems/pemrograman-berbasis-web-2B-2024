let tasks = [];
//Menambahkan tugas baru ke dalam array tasks dan menampilkan ulang daftar tugas.
function addTask() {
    const taskInput = document.getElementById("taskInput");
    const taskText = taskInput.value.trim();
    if (taskText !== "") {
        const existingTaskIndex = tasks.findIndex(task => task.text === taskText);
        if (existingTaskIndex > -1) {

        } else {
            tasks.push({ text: taskText, done: false });
            displayTasks();
            saveTasks();
            taskInput.value = "";
        }
    }
}
//Mengisi input dengan teks tugas yang akan ditambahkan
function toggleTask(index) {
    tasks[index].done = !tasks[index].done;
    displayTasks();
}
//Menghapus tugas dari array berdasarkan indeks
function deleteTask(index) {
    tasks.splice(index, 1);
    displayTasks();
    saveTasks();
}
//menandai tugas sebagai selesai/batal selesai
function markAsDone(index) {
    tasks[index].done = !tasks[index].done;
    displayTasks();
    saveTasks();
}
// Mengubah teks tugas berdasarkan indeks
function editTask(index) {
    const newTaskText = prompt("Masukkan teks baru untuk tugas:", tasks[index].text);
    if (newTaskText !== null) {
        tasks[index].text = newTaskText.trim();
        displayTasks();
        saveTasks();
    }
}
//menyimpan daftar tugas ke local storage
function saveTasks() {
    localStorage.setItem("tasks", JSON.stringify(tasks));
}
//Menampilkan ulang daftar tugas berdasarkan isi dari array 
function displayTasks() {
    const taskList = document.getElementById("taskList");
    taskList.innerHTML = "";
    tasks.forEach((task, index) => {
        const li = document.createElement("li");
        li.innerHTML = `
            <span class="${task.done ? 'task-done' : ''}" onclick="toggleTask(${index})">${task.text}</span>
            <button onclick="editTask(${index})">Ubah</button>
            <button onclick="deleteTask(${index})">Hapus</button>
            <button onclick="markAsDone(${index})">${task.done ? 'Batal Selesai' : 'Tandai Selesai'}</button>
        `;
        taskList.appendChild(li);
    });
}
//memeriksa apakah ada daftar tugas yang disimpan di local storage dan menampilkan nya jika ada 
window.onload = function () {
    const savedTasks = localStorage.getItem("tasks");
    if (savedTasks) {
        tasks = JSON.parse(savedTasks);
        displayTasks();
    }
}