function addTask() {
    var taskInput = document.getElementById("taskInput");
    var taskList = document.getElementById("taskList");
    var taskText = taskInput.value.trim();

    if (taskText !== "") {
        var li = document.createElement("li");
        li.dataset.completed = "false";
        li.innerHTML = `
            <span>${taskText}</span>
            <button onclick="toggleTask(this)">Selesai</button>
            <button onclick="editTask(this)">Edit</button>
            <button onclick="deleteTask(this)">Hapus</button>
        `;
        taskList.appendChild(li);
        taskInput.value = "";
    }
}

function toggleTask(button) {
    var taskText = button.previousElementSibling;
    taskText.classList.toggle("completed");
    var li = button.parentElement;
    var completed = li.dataset.completed === "true";
    li.dataset.completed = completed ? "false" : "true";
    button.textContent = completed ? "Selesai" : "Belum Selesai";
}

function editTask(button) {
    var taskText = button.previousElementSibling.previousElementSibling;
    var li = button.parentElement;
    var completed = li.dataset.completed === "true";
    if (!completed) {
        var newText = prompt("Edit task:", taskText.textContent);
        if (newText !== null) {
            taskText.textContent = newText.trim();
        }
    } else {
        alert("Tugas sudah selesai dan tidak bisa diedit.");
    }
}

function deleteTask(button) {
    var li = button.parentElement;
    li.remove();
}