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
        addUsers(users);
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

function addUsers(users) {
    clearResults()
    for(let user of users) {
        createListItem(user);
    }
}

function createListItem(user) {
    console.log(user);
    const container = document.createElement('div');
    const element = document.createElement('p');

    element.innerText = user.username;
    element.classList.add('text-success', 'my-3');
    container.appendChild(element);
    usersList.appendChild(container);
}

function clearResults() {
    usersList.classList.remove('d-none');
    usersList.innerHTML = '';
}