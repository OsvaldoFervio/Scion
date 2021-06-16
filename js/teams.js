const usersList = document.getElementById('users-list');
const usernameInput = document.getElementById('username');

usernameInput.onkeypress = handleKeypress;

const request = new XMLHttpRequest();
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
        const users = JSON.parse(this.responseText);
        addManager(users, clickHandleManager)
    }
}

function fetchUsersByUsername(value) {
    const url = `${BASE_URL}?search=${value}`;
    request.open('GET', url);
    request.send();
}

function handleKeypress() {
    const value = usernameInput.value;
    if(value)
        fetchUsersByUsername(value);
    else
        clearResults()
}

function clickHandleManager(event) {
    const managerInput = document.getElementById('manager_id');

    usernameInput.value = event.target.innerText;
    managerInput.value = event.target.dataset.id;
}

function addUsers(users, clickFunction) {
    clearResults()
    for(let user of users) {
        createListItem(user, clickFunction);
    }
}

function addManager(users, clickFunction) {
    addUsers(users, clickFunction);
}

function createListItem(user, clickFunction) {
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

function clearResults() {
    usersList.classList.remove('d-none');
    usersList.innerHTML = '';
}