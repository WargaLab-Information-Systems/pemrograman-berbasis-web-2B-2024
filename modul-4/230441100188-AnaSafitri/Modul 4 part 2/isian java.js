var tasks = [];

function addTask() {
  var taskInput = document.getElementById("taskInput");
  var taskText = taskInput.value.trim();
  if (taskText !== "") {
    tasks.push({ text: taskText, completed: false });
    taskInput.value = "";
    renderTasks();
  }
}

function renderTasks() {
  var taskList = document.getElementById("taskList");
  taskList.innerHTML = "";
  tasks.forEach(function(task, index) {
    var taskItem = document.createElement("li"); //untuk membuat element html li
    taskItem.textContent = task.text;
    if (task.completed) {
      taskItem.classList.add("completed"); //untuk menambahkan satu kelas atau lebih ke element html
    }
    taskItem.classList.add("taskItem");
    taskItem.addEventListener("click", function() { //memberikan event listerner pada variabel lokal taskitem
      toggleTask(index);
    });
    taskList.appendChild(taskItem); //digunakan untuk menambahkan elemen taskItem ke dalam elemen yang ditentukan sebagai taskList.
  });
}

function toggleTask(index) {
  tasks[index].completed = !tasks[index].completed;
  renderTasks(); //memperbarui tampilan suatu komponen, daftar, atau elemen pada halaman web
}

// Panggil renderTasks() untuk memuat daftar tugas awal saat halaman dimuat
window.onload = function() {
  renderTasks();
};
document.getElementById("dropdownMenu").addEventListener("change", function() {
    var selectedValue = this.value;
    console.log("Materi yang dipilih:", selectedValue);
    // Lakukan sesuatu sesuai dengan materi yang dipilih
  });
  