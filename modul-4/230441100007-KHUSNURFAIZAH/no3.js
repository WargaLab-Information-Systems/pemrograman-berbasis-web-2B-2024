const inputBox = document.getElementById("input-box");
const listContainer = document.getElementById("list-container");

function addTask() {
    if (inputBox.value === '') {
        alert("You must write something!");
    } else {
        let li = document.createElement("li");
        li.innerHTML = inputBox.value;

        // Add edit button
        let editButton = document.createElement("span");
        editButton.innerHTML = "✎";
        editButton.className = "edit";
        editButton.setAttribute("onclick", "editTask(this)");
        li.appendChild(editButton);

        // Add delete button
        let deleteButton = document.createElement("span");
        deleteButton.innerHTML = "\u00D7";
        deleteButton.className = "delete";
        deleteButton.setAttribute("onclick", "deleteTask(this)");
        li.appendChild(deleteButton);

        listContainer.appendChild(li);
        inputBox.value = "";
        saveData();
    }
}

function editTask(editButton) {
    let li = editButton.parentElement;
    let newValue = prompt("Edit your task:", li.childNodes[0].nodeValue);
    if (newValue !== null) {
        li.childNodes[0].nodeValue = newValue;
        saveData();
    }
}

function deleteTask(deleteButton) {
    let li = deleteButton.parentElement;
    li.remove();
    saveData();
}

listContainer.addEventListener("click", function(e) {
    if (e.target.tagName === "LI") {
        e.target.classList.toggle("checked");
        saveData();
    }
}, false);

function saveData() {
    localStorage.setItem("data", listContainer.innerHTML);
}

function showTask() {
    listContainer.innerHTML = localStorage.getItem("data");
}
showTask();
