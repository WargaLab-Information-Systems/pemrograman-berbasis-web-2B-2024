document.addEventListener('DOMContentLoaded', function () {
    const todoInput = document.getElementById('todo-input');
    const addBtn = document.getElementById('add-btn');
    const todoList = document.getElementById('todo-list');

    addBtn.addEventListener('click', function () {
        const taskText = todoInput.value.trim();
        if (taskText) {
            addTask(taskText);
            todoInput.value = '';
        }
    });

    function addTask(text) {
        const li = document.createElement('li');
        li.textContent = text;

        const completeBtn = document.createElement('button');
        completeBtn.textContent = 'Complete';
        completeBtn.addEventListener('click', function () {
            li.classList.toggle('completed');
        });

        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = 'Delete';
        deleteBtn.addEventListener('click', function () {
            li.remove();
        });

        const editBtn = document.createElement('button');
        editBtn.textContent = 'Edit';
        editBtn.addEventListener('click', function () {
            const newText = prompt('Edit your task:', li.textContent);
            if (newText !== null) {
                li.childNodes[0].nodeValue = newText;
            }
        });

        li.appendChild(editBtn);
        li.appendChild(completeBtn);
        li.appendChild(deleteBtn);
        todoList.appendChild(li);
    }
});
