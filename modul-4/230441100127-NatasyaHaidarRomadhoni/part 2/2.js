document.addEventListener('DOMContentLoaded', function() {
    let input = document.querySelector('#todo-input');
    let addBtn = document.querySelector('button');
    let tasks = document.querySelector('.todo-list');

    // Add btn disabled
    input.addEventListener('keyup', () => {
        // input tidak kosong
        if (input.value.trim() != 0) { 
            addBtn.classList.add('active');
        } else {
            addBtn.classList.remove('active');
        }
    });

    //add new item to list
    addBtn.addEventListener('click', () => {
        if (input.value.trim() != 0) {
            let newItem = document.createElement('div');
            newItem.classList.add('task');
            newItem.innerHTML = `
                <span class="task-text">${input.value}</span>
                <button class="edit-btn">Edit</button>
                <button class="complete-btn">Complete</button>
                <button class="delete-btn">Delete</button>
            `;
            tasks.appendChild(newItem);
            input.value = '';
        } else {
            alert('Please enter a task');
        }
    });

    //delete item from the list
    tasks.addEventListener('click', (e) => {
        if (e.target.classList.contains('delete-btn')) {
            e.target.parentElement.remove();
        }
    });

    //edit item
    tasks.addEventListener('click', (e) => {
        if (e.target.classList.contains('edit-btn')) {
            let span = e.target.parentElement.querySelector('.task-text');
            let currentText = span.textContent;
            let newText = prompt('Enter new content:', currentText);
            if (newText !== null && newText.trim() !== '') {
                span.textContent = newText;
            }
        }
    });

    //mark item as completed
    tasks.addEventListener('click', (e) => {
        if (e.target.classList.contains('complete-btn')) {
            e.target.parentElement.classList.toggle('completed');
        }
    });
});
