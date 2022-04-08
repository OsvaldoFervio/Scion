const usersListP = document.getElementById('users-list-p');
const btnAdd = document.getElementById('btn-add');
const usernameParticipantInput = document.getElementById('username-p')

// Set event
btnAdd.onclick = btnAddClick
request.onreadystatechange = onProcessResult;

function btnAddClick() {
    const username = usernameParticipantInput.value
    const type = usernameParticipantInput.dataset.usernameType;
    const count = participantsList.children.length;
    const exists = verifyParticipantUser(username)
    if(!exists && count < 6) {
        fetchUsersByUsername(username, type)
    }
}

function onProcessResult() {
    if(this.readyState === 4
        && this.status === 200){
        const response = JSON.parse(this.responseText);
        console.log(response)
        if(response.searchType === 'manager') {
            addManager(response.data, clickHandleManager)
        } else {
            processParticipantResult(response)
        }
    }
}

function processParticipantResult(response) {
    const exists = response.exists
    if(response.data.length > 0 && exists) {
        const {id, username, first_name, last_name} = response.data[0]
        createParticipantItem({id, username, firstName: first_name, lastName: last_name})
    } else if (!response.exists) {
        createGhostUser(response.username)
    } else {
        console.log('Usuario no disponible para equipo')
    }
}

function verifyParticipantUser(username) {
    return document.querySelector(`[data-username='${username}']`) != null
}

function createGhostUser(username) {
    const id = -1
    const firstName = 'Usuario'
    const lastName = 'Pendiente'
    createParticipantItem({ id, username, firstName, lastName})
}