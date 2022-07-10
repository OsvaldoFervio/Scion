const usersList = document.getElementById('users-list');
const usernameInput = document.getElementById('username');

const usernamePInput = document.getElementById('username-p');
const alertResult = document.getElementById('alert-result');

const participantsList = document.getElementById('participants-lits');

const imageInput = document.getElementById('image-input');
const teamImageElem = document.getElementById('image');

// Set event
usernameInput.onkeypress = handleKeypress;

usersList.onmouseleave = handleMouseLeave;

imageInput.onchange = handleSetImage;

function onProcessResult() {
    if(this.readyState === 4
        && this.status === 200){
        const response = JSON.parse(this.responseText);
        if(response.searchType === 'manager') {
            addManager(response.data, clickHandleManager)
        } else {
            addParticipant(response.data, clickHandlerParticipant)
        }
    }
}

function fetchUsersByUsername(value, type, gameUserId) {
    const request = new XMLHttpRequest();
    const url = `${BASE_URL}?search=${value}&type=${type}&user-game-id=${gameUserId}`;
    request.open('GET', url);
    // Set callback for process result
    request.onreadystatechange = onProcessResult;
    request.send();
}

function searchVerifyUsername(value) {
    const url = `${BASE_URL}/verify?q=${value}`
    request.open('GET', url)
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            const data = JSON.parse(this.responseText)
            const id = data.id
            const firstName = data.first_name
            const lastName = data.last_name
            const username = data.username
            createParticipantItem({ id, username, firstName, lastName})
            clearSearch()
        } else if(this.readyState === 4 && this.status !== 200) {
            showAlertResult('El usuario no se encontró')
        }
    }
    request.send()
}

function handleKeypress(event) {
    const type = event.target.dataset.usernameType;
    if(type === 'manager') {
        const value = event.target.value;
        fetchUsersByUsername(value, type);
    }
}

function clickHandleManager(event) {
    const managerInput = document.getElementById('manager_id');

    usernameInput.value = event.target.innerText;
    managerInput.value = event.target.dataset.id;
}

function clickHandlerParticipant(event) {
    const count = participantsList.children.length;
    if(count < 6) {
        const username = event.target.innerText;
        const dataset = event.target.dataset;
        const { id, firstName, lastName } = dataset
        createParticipantItem({id, username, firstName, lastName})
    }
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
    const container = document.createElement('div');
    const element = document.createElement('p');

    element.innerText = user.username;
    element.dataset.id = user.id
    element.dataset.firstName = user.first_name;
    element.dataset.lastName = user.last_name;

    element.classList.add('text-success', 'my-3');
    element.style.cursor = 'pointer';

    container.onclick = clickFunction;
    container.appendChild(element);
    usersList.appendChild(container);
}

function handleDeleteClick(event) {
    event.target.parentElement.parentElement.parentElement.parentElement.remove();
    checkNumberParticipants()
}

function clearResults(container) {
    if(container) {
        container.classList.remove('d-none');
        container.innerHTML = '';
    }
}

function handleMouseLeave(event) {
    event.target.innerHTML = '';
    event.target.classList.add('d-none');
}

function handleSetImage(event) {
    const [file] = imageInput.files
    if(file) {
        teamImageElem.classList.remove('d-none');
        teamImageElem.src = URL.createObjectURL(file);
    }
}

function clearSearch() {
    usernamePInput.value = ''
}

function showAlertResult(message) {
    if(message)
        alertResult.innerText = message
    alertResult.classList.remove('d-none');
}

function hideAlertResult() {
    alertResult.classList.add('d-none');
}

function verifyUser(username) {
    return document.querySelector(`div[data-username="${username}"]`) != null
}