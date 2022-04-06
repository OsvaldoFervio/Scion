const usersList = document.getElementById('users-list');
const usernameInput = document.getElementById('username');

const usernamePInput = document.getElementById('username-p');
const btnSearch = document.getElementById('btn-search');
const alertResult = document.getElementById('alert-result');

const participantsList = document.getElementById('participants-lits');

const imageInput = document.getElementById('image-input');
const teamImageElem = document.getElementById('image');

const request = new XMLHttpRequest();

// Set event
usernameInput.onkeypress = handleKeypress;

usersList.onmouseleave = handleMouseLeave;

imageInput.onchange = handleSetImage;

btnSearch.onclick = handleClickSearchUser;

// Set callback for process result
request.onreadystatechange = onProcessResult;

setupParticipantList()

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

function fetchUsersByUsername(value, type) {
    const url = `${BASE_URL}?search=${value}&type=${type}`;
    request.open('GET', url);
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

function handleClickSearchUser() {
    const username = usernamePInput.value
    if(verifyUser(username)){
        showAlertResult(`El usuario ${username} ya ha sido agregado`)
    } else {
        hideAlertResult()
        searchVerifyUsername(username)
    }
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

function createParticipantItem(user) {
    const container = document.createElement('div');
    const inputId = document.createElement('input');
    const wrapperElems = document.createElement('div');
    const divElement = document.createElement('div');
    const numberElement = document.createElement('span');
    const usernameEle = document.createElement('div');
    const nameEle = document.createElement('div');
    const deleteButton = createDeleteButton();

    container.classList.add('row');
    divElement.classList.add('col-md-12');
    wrapperElems.classList.add('row', 'px-2');
    numberElement.classList.add('col-md-1', 'pl-4', 'border-0', 'vertical-center', 'text-end');
    usernameEle.classList.add('form-control', 'col-md-2', 'tex-center', 'text-white');
    nameEle.classList.add('form-control', 'col-md-6', 'mx-2', 'text-white');

    usernameEle.style.background = 'rgba(0, 0, 0, 0.5)';
    nameEle.style.background = 'rgba(0, 0, 0, 0.5)';

    const count = participantsList.children.length + 1;

    inputId.id = `participant-${count}`;
    inputId.name = 'user_id[]';
    inputId.type = 'hidden';
    inputId.value = user.id;

    numberElement.innerText = count;
    usernameEle.innerText = user.username;
    nameEle.innerText = `${user.firstName} ${user.lastName}`;

    container.dataset.username = user.username

    if(user.id == -1)
        addGhostUserUsername(container, user.username)

    wrapperElems.appendChild(numberElement);
    wrapperElems.appendChild(usernameEle);
    wrapperElems.appendChild(nameEle);
    wrapperElems.appendChild(deleteButton);
    divElement.appendChild(wrapperElems);
    container.appendChild(inputId);
    container.appendChild(divElement);

    participantsList.appendChild(container);
    checkNumberParticipants(count);
}

function createDeleteButton() {
    const button = document.createElement('a');
    const icon = document.createElement('i');

    button.classList.add('border-0', 'vertical-center');
    icon.classList.add('booked-icon', 'ion-close-circled', 'border-0', 'text-white');

    button.appendChild(icon);

    button.onclick = (event) => {
        event.target.parentElement.parentElement.parentElement.parentElement.remove();
        checkNumberParticipants()
    }

    return button;
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

function checkNumberParticipants(){
    const count = participantsList.children.length;
    document.getElementById('btnCreate').disabled = count < 4;
}

function handleSetImage(event) {
    const [file] = imageInput.files
    if(file) {
        teamImageElem.classList.remove('d-none');
        teamImageElem.src = URL.createObjectURL(file);
    }
}

function setupParticipantList() {
    const count = participantsList.children.length;
    for(let i = 0; i < count; i++){
        const row = participantsList.children[i];
        row.querySelector('a').onclick = handleDeleteClick;
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

function addGhostUserUsername(element, username) {
    const inputUsernameHidden = document.createElement('input')
    inputUsernameHidden.type = 'hidden'
    inputUsernameHidden.name = 'pending_username[]'
    inputUsernameHidden.value = username
    element.appendChild(inputUsernameHidden)
}