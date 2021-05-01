let btnTask = document.querySelector('#addTask');
let tasksContainer = document.querySelector('#taskContainer');

// Insert new task on event submit
document.forms['taskForm'].addEventListener('submit', function (e) {
    e.preventDefault();
    let input = this;
    let title = input['title'].value;
    let des = input['description'].value;
    let date = 'Deadline:' + ' ' + input['dateCreation'].value;
    let prio = input['importance'].value;

    // Create an entire Task element
    let taskelem1 = document.createElement('a');
    taskelem1.classList.add('block', 'border-b', 'task');
    taskelem1.setAttribute('draggable', 'true');

    let taskelem2 = document.createElement('div');
    taskelem2.classList.add('border-l-2', 'border-transparent', 'hover:bg-gray-100', 'p-3', 'space-y-4');

    let taskelem3 = document.createElement('div');
    taskelem3.classList.add('flex', 'flex-row', 'items-center', 'space-x-2');

    // Title task
    let taskelem6 = document.createElement('strong');
    taskelem6.classList.add('flex-grow', 'text-sm');

    if (prio === 'Haute') {
        taskelem6.classList.add('text-red-400')
    } else if (prio === 'Moyenne') {
        taskelem6.classList.add('text-yellow-300')
    } else if (prio === 'Basse') {
        taskelem6.classList.add('text-green-400')
    }
    taskelem6.innerHTML = title;
    //Date Task
    let taskelem7 = document.createElement('p');
    taskelem7.classList.add('text-sm', 'text-gray-600');
    taskelem7.innerHTML = date;

    let taskelem8 = document.createElement('div');
    taskelem8.classList.add('flex', 'flex-row', 'items-center', 'space-x-1');

    // Description Task
    let taskelem11 = document.createElement('p');
    taskelem11.classList.add('flex-grow', 'truncate', 'text-xs');
    taskelem11.innerHTML = des;

    // Show Task in detail
    let btnShowTask = document.createElement('a');
    btnShowTask.classList.add('inline-block');
    btnShowTask.innerHTML = `<i class="far fa-eye cursor-pointer text-lg text-green-500"></i>`;

    //Delete Task
    let btnDeleteTask = document.createElement('a');
    btnDeleteTask.classList.add('inline-block', 'deleteTask');
    btnDeleteTask.innerHTML = `<i class= "fas ml-6 mr-3 cursor-pointer text-lg self-end fa-times-circle text-red-400" ></i>`;


    //Organize and append elements into the DOM
    taskelem11.append(btnDeleteTask);
    taskelem11.append(btnShowTask);
    taskelem3.append(taskelem6);
    taskelem3.append(taskelem7);
    taskelem8.append(taskelem11);
    taskelem2.append(taskelem3);
    taskelem2.append(taskelem8);
    taskelem1.append(taskelem2);
    tasksContainer.append(taskelem1);


    // DRAG&DROP
    const base = document.querySelectorAll('.task');

    // For loop to set a drag listenner on each append link,
    // (Drag must be on append listenner for followin the script continuity)
    for (let i = 0; i < base.length; i++) {
        base[i].addEventListener('dragstart', dragStart);
        base[i].addEventListener('dragend', dragEnd);
    }

    // When click is started
    function dragStart() {
        this.classList.add('dragged');
        // Background element disapear but drag still activate
        setTimeout(() => (this.classList.add('none')), 0);
    }

    // When click is release
    function dragEnd() {
        this.classList.remove('none', 'dragged');
    }
//DELETETASK
    const deleteBtn = document.querySelectorAll('.deleteTask')
    for (let k = 0; k < deleteBtn.length; k++) {
        deleteBtn[k].addEventListener('click', deleteTask)
    }

})
// Select all container for task
const node = document.querySelectorAll('.taskCase');

// Iteration on  every node to add multiple event on each of them
for (let y = 0; y < node.length; y++) {
    node[y].addEventListener('dragover', dragOver);
    node[y].addEventListener('dragenter', dragEnter);
    node[y].addEventListener('dragleave', dragLeave);
    node[y].addEventListener('drop', dragDrop);
}

// Over the container
function dragOver(e) {
    this.classList.add('bg-blue-100');
    e.preventDefault();
}

//Function listenner When a task  Enter in the container
function dragEnter(e) {
    e.preventDefault();
    this.classList.add('hovered');
}

//Function listenner When a task leave  the container
function dragLeave() {
    this.classList.remove('hovered');
    this.classList.remove('bg-blue-100');

}

//Function listenner When release on a task container
function dragDrop() {
    let draggedElement = document.querySelector('.dragged');
    this.append(draggedElement);
}

// Function listenner Delete task
function deleteTask(e) {
    e.preventDefault()
    this.parentNode.parentNode.parentNode.parentNode.remove();
}
