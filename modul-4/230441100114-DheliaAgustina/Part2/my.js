const todoInput = document.getElementById('todo-input');
const addTodoBtn = document.getElementById('add-todo');
const todoList = document.getElementById('todo-list');

let todos = [];

// Fungsi untuk muat list tugas
function loadTodos() {
  todoList.innerHTML = '';
  todos.forEach((todo, index) => {
    const li = document.createElement('li');
    li.textContent = todo.text;
    if (todo.completed) {
      li.classList.add('completed');
    }

    const editBtn = document.createElement('button');
    editBtn.textContent = 'Ubah';
    editBtn.addEventListener('click', () => editTodo(index));

    const deleteBtn = document.createElement('button');
    deleteBtn.textContent = 'Hapus';
    deleteBtn.addEventListener('click', () => deleteTodo(index));

    const completeBtn = document.createElement('button');
    completeBtn.textContent = todo.completed ? 'Belum Selesai' : 'Selesai';
    completeBtn.addEventListener('click', () => toggleComplete(index));

    li.appendChild(editBtn);
    li.appendChild(deleteBtn);
    li.appendChild(completeBtn);
    todoList.appendChild(li);
  });
}

// Fungsi untuk menambahkan tugas baru
function addTodo() {
  const todoText = todoInput.value.trim();
  if (todoText !== '') {
    todos.push({ text: todoText, completed: false });
    todoInput.value = '';
    loadTodos();
  }
}

// Fungsi untuk mengubah tugas
function editTodo(index) {
  const newText = prompt('Ubah tugas:', todos[index].text);
  if (newText !== null && newText.trim() !== '') {
    todos[index].text = newText.trim();
    loadTodos();
  }
}

// Fungsi untuk menghapus tugas
function deleteTodo(index) {
  todos.splice(index, 1);
  loadTodos();
}

// Fungsi untuk menandai tugas selesai/belum selesai
function toggleComplete(index) {
  todos[index].completed = !todos[index].completed;
  loadTodos();
}

// Event listener untuk tombol "Tambahkan"
addTodoBtn.addEventListener('click', addTodo);

// Event listener untuk menekan tombol Enter pada input teks
todoInput.addEventListener('keydown', (event) => {
  if (event.key === 'Enter') {
    addTodo();
  }
});

// Muat list tugas pada saat halaman dimuat
loadTodos();