const usersListP = document.getElementById('users-list-p');
const btnAdd = document.getElementById('btn-add');
const usernameParticipantInput = document.getElementById('username-p')
const gameUserIdInput = document.getElementById('gameUserId-p')
const participantsList = document.getElementById('participants-lits');


const request = new XMLHttpRequest();

// Set event
btnAdd.onclick = btnAddClick
request.onreadystatechange = onProcessResult;

function fetchUsersByUsername(value, type, gameUserId) {
    const url = `${BASE_URL}?search=${value}&type=${type}&user-game-id=${gameUserId}`;
    request.open('GET', url);
    request.send();
}

function btnAddClick() {
    const username = usernameParticipantInput.value
    const gameUserId = gameUserIdInput.value
    const type = usernameParticipantInput.dataset.usernameType;
    const count = participantsList.children.length;
    const exists = verifyParticipantUser(username)
    if(!exists && count < 6) {
        fetchUsersByUsername(username, type, gameUserId)
    }
}

function onProcessResult() {
    if(this.readyState === 4 && this.status === 200){
        const response = JSON.parse(this.responseText);
        processParticipantResult(response)
    }
}

function processParticipantResult(response) {
    const exists = response.exists
    if(response.data.length > 0 && exists) {
        const {id, username, first_name, last_name} = response.data[0]
        const gameUserId = response.gameUserId;
        createParticipantItem({id, username, firstName: first_name, lastName: last_name, gameUserId: gameUserId})
    } else if (!response.exists) {
        createGhostUser(response.username, response.gameUserId)
    } else {
        showNotAvailableUserAlert()
    }
}

function verifyParticipantUser(username) {
    return document.querySelector(`[data-username='${username}']`) != null
}

function createGhostUser(username, gameUserId) {
    const id = -1
    const firstName = 'Ghost'
    const lastName = 'User'
    createParticipantItem({ id, username, firstName, lastName, gameUserId})
}

function showNotAvailableUserAlert() {
    document.getElementById('alert-not-available').classList.remove('d-none')
    setTimeout(() => {
        document.getElementById('alert-not-available').classList.add('d-none');
    }, 3000)
}

function createParticipantItem(user) {

    const container = document.createElement('div');
    const inputId = document.createElement('input');
    const inputGameUserId = document.createElement('input');
    const wrapperElems = document.createElement('div');
    const divElement = document.createElement('div');
    const numberElement = document.createElement('span');
    const usernameEle = document.createElement('div');
    const nameEle = document.createElement('div');
    const gameidEle = document.createElement('div');
    const deleteButton = createDeleteButton();

    container.classList.add('row');
    divElement.classList.add('col-md-12');
    wrapperElems.classList.add('row', 'px-2');
    numberElement.classList.add('col-md-1', 'pl-4', 'border-0', 'vertical-center', 'text-end');
    usernameEle.classList.add('form-control', 'col-md-2', 'tex-center', 'text-white');
    nameEle.classList.add('form-control', 'col-md-5', 'mx-2', 'text-white');
    gameidEle.classList.add('form-control', 'col-md-3', 'mx-2', 'text-white');

    usernameEle.style.background = 'rgba(0, 0, 0, 0.5)';
    nameEle.style.background = 'rgba(0, 0, 0, 0.5)';
    gameidEle.style.background = 'rgba(0, 0, 0, 0.5)';

    let elementIdName = ''
    let gameUserIdName = ''

    const participantsCount = participantsList.children.length + 1
    inputId.id = `participant-${participantsCount}`

    if(user.id == -1){
        const count = document.querySelectorAll('[name*="[username]"]').length - 1
        gameUserIdName = `pending_users[${count + 1}][game_user_id]`
    } else {
        const count = document.querySelectorAll('[name*="[user_id]"]').length - 1
        elementIdName = `users[${count + 1}][user_id]`
        gameUserIdName = `users[${count + 1}][game_user_id]`
    }
    inputId.name = elementIdName
    inputId.type = 'hidden';
    inputId.value = user.id;

    inputGameUserId.id = `gameuser-${participantsCount}`
    inputGameUserId.name = gameUserIdName
    inputGameUserId.type = 'hidden'
    inputGameUserId.value = user.gameUserId



    numberElement.innerText = participantsCount;
    usernameEle.innerText = user.username;
    nameEle.innerText = `${user.firstName} ${user.lastName}`;
    gameidEle.innerText = user.gameUserId;

    container.dataset.username = user.username



    if(user.id == -1) {
        addGhostUserUsername(container, user.username)
    }

    wrapperElems.appendChild(numberElement);
    wrapperElems.appendChild(usernameEle);
    wrapperElems.appendChild(nameEle);
    wrapperElems.appendChild(gameidEle);
    wrapperElems.appendChild(deleteButton);
    divElement.appendChild(wrapperElems);
    container.appendChild(inputId);
    container.appendChild(inputGameUserId);
    container.appendChild(divElement);

    participantsList.appendChild(container);
    checkNumberParticipants(participantsCount);
}

function checkNumberParticipants(){
    const count = participantsList.children.length;
    document.getElementById('btnCreate').disabled = count < 4;
}

function addGhostUserUsername(element, username) {
    const inputUsernameHidden = document.createElement('input')
    const pendingUsers = document.querySelectorAll('[name*="username"]').length - 1
    inputUsernameHidden.type = 'hidden'
    inputUsernameHidden.name = `pending_users[${pendingUsers + 1}][username]`
    inputUsernameHidden.value = username
    element.appendChild(inputUsernameHidden)
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