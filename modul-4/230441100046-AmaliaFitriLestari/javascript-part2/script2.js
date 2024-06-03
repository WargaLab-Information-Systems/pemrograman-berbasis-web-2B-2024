// variabel untuk menyimpan daftar tugas
let taskList = [];
 
// fungsi untuk menambahkan list tugas ke daftar tugas
function addTask() {
    const taskInput = document.getElementById('taskInput');
    const taskText = taskInput.value.trim();
    if (taskText) {
        taskList.push({ text: taskText, completed: false });
        taskInput.value = '';
        renderTasks();
    }
}

// fungsi untuk memperbarui tampilan
function renderTasks() {
    const taskListElement = document.getElementById('taskList');
    taskListElement.innerHTML = '';
    taskList.forEach((task, index) => {
        const taskItem = document.createElement('li');
        taskItem.className = task.completed ? 'completed' : '';

        const taskText = document.createElement('span');
        taskText.textContent = task.text;

        const editButton = document.createElement('button');
        editButton.textContent = 'Ubah';
        editButton.className = 'edit';
        editButton.onclick = () => editTask(index);

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Hapus';
        deleteButton.className = 'delete';
        deleteButton.onclick = () => deleteTask(index);

        const completeButton = document.createElement('button');
        completeButton.textContent = task.completed ? 'Belum Selesai' : 'Selesai';
        completeButton.className = 'complete';
        completeButton.onclick = () => toggleCompleteTask(index);

        taskItem.appendChild(taskText);
        taskItem.appendChild(completeButton);
        taskItem.appendChild(editButton);
        taskItem.appendChild(deleteButton);

        taskListElement.appendChild(taskItem);
    });
}

// fungsi untuk menghapus satu list tugas
function deleteTask(index) {
    taskList.splice(index, 1);
    renderTasks();
}

// fungsi untuk mengubah status (selesai/belum selesai)
function toggleCompleteTask(index) {
    taskList[index].completed = !taskList[index].completed;
    renderTasks();
}

// fungsi untuk edit
function editTask(index) {
    const newTaskText = prompt('Ubah tugas:', taskList[index].text);
    if (newTaskText !== null && newTaskText.trim() !== '') {
        taskList[index].text = newTaskText.trim();
        renderTasks();
    }
}




