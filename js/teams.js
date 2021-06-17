const usersList = document.getElementById('users-list');
const usernameInput = document.getElementById('username');

const usersListP = document.getElementById('users-list-p');
const usernamePInput = document.getElementById('username-p');

const request = new XMLHttpRequest();

// Set event
usernameInput.onkeypress = handleKeypress;
usernamePInput.onkeypress = handleKeypress;

// Set callback for process result
request.onreadystatechange = onProcessResult;

const users = [
    {
        id: 1,
        username: "elchido",
    },
    {
        id: 2,
        username: "lala"
    }
]

function onProcessResult() {
    if(this.readyState === 4
        && this.status === 200){
        const response = JSON.parse(this.responseText);
        if(response.searchType === 'manager') {
            addManager(response.data, clickHandleManager)
        } else {
            addParticipant(response.data, () => console.log('Hello World'))
        }
    }
}

function fetchUsersByUsername(value, type) {
    const url = `${BASE_URL}?search=${value}&type=${type}`;
    request.open('GET', url);
    request.send();
}

function handleKeypress(event) {
    const type = event.target.dataset.usernameType;
    const value = event.target.value;
    fetchUsersByUsername(value, type);
}

function clickHandleManager(event) {
    const managerInput = document.getElementById('manager_id');

    usernameInput.value = event.target.innerText;
    managerInput.value = event.target.dataset.id;
}

function addUsers(users, type, clickFunction) {
    const container = type === 'manager' ? usersList : usersListP;
    clearResults(container);
    for(let user of users) {
        createListItem(user, container, clickFunction);
    }
}

function addManager(users, clickFunction) {
    addUsers(users, 'manager', clickFunction);
}

function addParticipant(users, clickFunction) {
    addUsers(users, 'participant', clickFunction);
}

function createListItem(user, usersList, clickFunction) {
    console.log(user);
    const container = document.createElement('div');
    const element = document.createElement('p');

    element.innerText = user.username;
    element.dataset.id = user.id

    element.classList.add('text-success', 'my-3');
    element.style.cursor = 'pointer';

    container.onclick = clickFunction
    container.appendChild(element);
    usersList.appendChild(container);
}

function clearResults(container) {
    if(container) {
        container.classList.remove('d-none');
        container.innerHTML = '';
    }
}