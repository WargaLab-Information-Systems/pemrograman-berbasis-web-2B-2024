document.getElementById("add-task").addEventListener("click", function () {
  const taskText = document.getElementById("new-task").value;
  if (taskText) {
    addTask(taskText);
    document.getElementById("new-task").value = "";
  }
});

function addTask(taskText) {
  const todoList = document.getElementById("todo-list");

  const li = document.createElement("li");

  const textContainer = document.createElement("div");
  textContainer.className = "text";

  const text = document.createElement("p");
  text.textContent = taskText;

  const buttonContainer = document.createElement("div");
  buttonContainer.className = "buttons";

  const completeButton = document.createElement("button");
  completeButton.textContent = "Selesai";
  completeButton.addEventListener("click", function () {
    li.classList.toggle("completed");
    if (li.classList.contains("completed")) {
      document.getElementById("completed-list").appendChild(li);
      completeButton.textContent = "Batal";
      buttonContainer.removeChild(editButton);
    } else {
      document.getElementById("todo-list").appendChild(li);
      completeButton.textContent = "Selesai";
      buttonContainer.insertBefore(editButton, deleteButton);
    }
  });

  const editButton = document.createElement("button");
  editButton.textContent = "Ubah";
  editButton.addEventListener("click", function () {
    const newTaskText = prompt(
      "Silahkan ubah tugas:",
      li.firstChild.textContent
    );
    if (newTaskText) {
      li.firstChild.textContent = newTaskText;
    }
  });

  const deleteButton = document.createElement("button");
  deleteButton.textContent = "Hapus";
  deleteButton.addEventListener("click", function () {
    li.parentNode.removeChild(li);
  });

  textContainer.appendChild(text);
  buttonContainer.appendChild(completeButton);
  buttonContainer.appendChild(editButton);
  buttonContainer.appendChild(deleteButton);

  li.appendChild(textContainer);
  li.appendChild(buttonContainer);

  todoList.appendChild(li);
}
