const todoInput = document.getElementById('todo-input');
const addBtn = document.getElementById('add-btn');
const todoList = document.getElementById('todo-list');

let todos = [];

function renderTodos() {
  todoList.innerHTML = '';
  todos.forEach((todo, index) => {
    const todoItem = document.createElement('li');
    todoItem.className = 'todo-item';
    if (todo.completed) {
      todoItem.classList.add('completed');
    }

    const todoText = document.createElement('span');
    todoText.textContent = todo.text;
    todoItem.appendChild(todoText);

    const actions = document.createElement('div');
    actions.className = 'actions';

    const toggleBtn = document.createElement('button');
    toggleBtn.textContent = todo.completed ? 'Undo' : 'Complete';
    toggleBtn.addEventListener('click', () => toggleTodo(index));
    actions.appendChild(toggleBtn);

    const editBtn = document.createElement('button');
    editBtn.textContent = 'Edit';
    editBtn.className = 'edit';
    editBtn.addEventListener('click', () => editTodo(index));
    actions.appendChild(editBtn);

    const deleteBtn = document.createElement('button');
    deleteBtn.textContent = 'Delete';
    deleteBtn.className = 'delete';
    deleteBtn.addEventListener('click', () => deleteTodo(index));
    actions.appendChild(deleteBtn);

    todoItem.appendChild(actions);
    todoList.appendChild(todoItem);
  });
}

function addTodo() {
  const todoText = todoInput.value.trim();
  if (todoText) {
    const newTodo = {
      text: todoText,
      completed: false
    };
    todos.push(newTodo);
    todoInput.value = '';
    renderTodos();
  }
}

function toggleTodo(index) {
  todos[index].completed = !todos[index].completed;
  renderTodos();
}

function editTodo(index) {
  const newText = prompt('Enter new todo text', todos[index].text);
  if (newText !== null) {
    todos[index].text = newText.trim();
    renderTodos();
  }
}

function deleteTodo(index) {
  todos.splice(index, 1);
  renderTodos();
}

addBtn.addEventListener('click', addTodo);