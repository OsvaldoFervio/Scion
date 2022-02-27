const usersListP = document.getElementById('users-list-p');

// Set event

usernamePInput.onkeypress = handleKeypress;
request.onreadystatechange = onProcessResult

function onProcessResult() {
    if(this.readyState === 4
        && this.status === 200){
        const response = JSON.parse(this.responseText);
        if(response.searchType === 'manager') {
            addManager(response.data, clickHandleManager)
        } else {
            if(response.data.length > 0)
                addParticipant(response.data, clickHandlerParticipant)
            else
                showUserGhostAddAction()
        }
    }
}

function showUserGhostAddAction() {
    const username = usernamePInput.value
    createUserGhostAddAction(username)
}

function createUserGhostAddAction(username) {
    const div = document.createElement('div')
    const divUser = document.createElement('div')
    const btnAdd = document.createElement('button')
    const btnRemove = document.createElement('button')

    div.classList.add('d-flex', 'flex-row','m-1', 'align-items-center')
    btnAdd.classList.add('mx-1', 'btn', 'btn-sm', 'btn-outline-info')
    btnRemove.classList.add('mx-1', 'btn', 'btn-sm', 'btn-outline-danger')

    div.id = `user-${username}-ghost-action`

    divUser.innerText = `No se encontró a ${username}`
    btnAdd.innerText = 'Agregar'
    btnRemove.innerText = 'Eliminar'

    btnAdd.type = 'button'
    btnRemove.type = 'button'


    btnAdd.dataset.username = username
    btnRemove.dataset.username = username

    btnAdd.onclick = createGhostUser
    btnRemove.onclick = removeGhostUser

    div.appendChild(divUser)
    div.appendChild(btnAdd)
    div.appendChild(btnRemove)

    usernamePInput.parentElement.parentElement.appendChild(div)
}

function verifyGhostUser(username) {
    return document.getElementById(`user-${username}-ghost-action`) == null
}

function removeGhostAddAction(username) {
    document.getElementById(`user-${username}-ghost-action`).remove()
}

function createGhostUser(event) {
    const id = -1
    const firstName = 'Usuario'
    const lastName = 'Pendiente'
    const username = event.target.dataset.username
    createParticipantItem({ id, username, firstName, lastName})
    removeGhostAddAction(username)
}

function removeGhostUser(event) {
    const username = event.target.dataset.username
    removeGhostAddAction(username)
}