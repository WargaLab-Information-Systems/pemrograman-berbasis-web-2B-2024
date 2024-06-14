let tasks = [];

    function addTask() {
        const taskInput = document.getElementById('taskInput');
        const task = taskInput.value.trim();
        if (task !== '') {
            tasks.push({ name: task, completed: false });
            renderTasks();
            taskInput.value = '';
        }
    }

    function toggleCompleted(index) {
        tasks[index].completed = !tasks[index].completed;
        renderTasks();
    }

    function deleteTask(index) {
        tasks.splice(index, 1);
        renderTasks();
    }

    function editTask(index) {
        const newName = prompt("Masukkan nama baru untuk tugas:", tasks[index].name);
        if (newName !== null && newName.trim() !== '') {
            tasks[index].name = newName.trim();
            renderTasks();
        }
    }

    function renderTasks() {
        const taskList = document.getElementById('taskList');
        taskList.innerHTML = '';
        tasks.forEach((task, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                <span class="${task.completed ? 'completed' : ''}" onclick="toggleCompleted(${index})">${task.name}</span>
                <button class="edit-button" onclick="editTask(${index})">Edit</button>
                <button onclick="deleteTask(${index})">Hapus</button>
            `;
            taskList.appendChild(li);
        });
    }

    function toggleDropdown() {
        var dropdownMenu = document.getElementById("myDropdown");
        dropdownMenu.classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }