const component = {
    data() {
        return {
            id: id,
            URL: URL,
            csrf_field: csrf_field,
            item: '',
            gameUserId: '',
            participants: participants,
            showAlert: false,
            alertMessage: '',
            members: {
                added: {
                    ghosts: [],
                    users: []
                },
                removed: []
            }
        }
    },
    computed: {
        isNewParticipants() {
            return this.members.added.ghosts.length > 0 ||
                this.members.added.users.length > 0 ||
                this.members.removed.length > 0
        }
    },
    methods: {
        remove(index, item) {
            if(item.id === -1 || item.added) {
                const type = item.added ? 'users' : 'ghosts'
                this.participants.splice(index, 1)
                this.members.added[type] = [...this.members.added[type].filter(m => m.username !== item.username)]
            } else {
                const id = item.team_member_id !== undefined ? item.team_member_id : item.id
                const user_id = item.type !== undefined ? item.id : -1
                this.members.removed.push({id: id, user_id: user_id, action: 'deleted'})
                item.deleted = true
            }
        },
        add() {
            fetch(`${BASE_URL}?search=${this.item}&type=participant`)
                .then(response => {
                    if(response.ok)
                        return response.json()
                    else
                        return Promise.reject('Error')
                })
                .then(result => {
                    if(result.data.length > 0 && result.exists) {
                        const {id, username, first_name, last_name} = result.data[0]
                        this.participants.push({
                            id: id,
                            username: username,
                            firstName: first_name,
                            lastName: last_name,
                            game_user_id: this.gameUserId,
                            added: true})
                        this.members.added.users.push({user_id: id, username: username, game_user_id: this.gameUserId, action: 'added'})
                    } else if(! result.exists) {
                        this.participants.push({id: -1, username: this.item, game_user_id: this.gameUserId})
                        this.members.added.ghosts.push({
                            user_id: -1,
                            username: this.item,
                            game_user_id: this.gameUserId,
                            action: 'added'})
                    } else {
                        this.showAlert = true
                        this.alertMessage = 'Este usuario no está disponible'
                    }
                    this.item = ''
                    this.gameUserId = ''
                })
                .catch(err => {
                    this.showAlert = true
                    this.alertMessage = 'Ocurrio un problema'
                    console.log(err)
                })
        }
    },
    template: `
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <input class="form-control col-md-2" v-model="item" type="text" placeholder="Username...">
                    <input class="form-control col-md-2" v-model="gameUserId" type="text" placeholder="Game Id">
                    <button type="button" class="btn btn-info col-md-1" @click="add" :disabled="participants.length > 5">Agregar</button>
                    <span class="col-md-4 vertical-center border-0">Agrega 4 mínimo y 6 máximo de participantes</span>
                </div>
            </div>
            <div class="alert" v-if="showAlert">
                {{ alertMessage }}
            </div>
        </div>
        <form :action="\`\${URL}/admin/teams/${id}/participants\`" enctype="application/json" method="POST">
        ${csrf_field}
        <input name="_method" value="PUT" hidden>
        <div v-for="(item, index) in members.added.ghosts">
            <input type="hidden" :name="\`participants[added][ghostusers][\${index}][username]\`" :value="item.username">
            <input type="hidden" :name="\`participants[added][ghostusers][\${index}][game_user_id]\`" :value="item.game_user_id">
        </div>
        <div v-for="(item, index) in members.added.users">
            <input type="hidden" :name="\`participants[added][users][\${index}][user_id]\`" :value="item.user_id">
            <input type="hidden" :name="\`participants[added][users][\${index}][game_user_id]\`" :value="item.game_user_id">
        </div>
        <div v-for="(item, index) in members.removed">
            <input type="hidden" :name="\`participants[removed][\${index}][id]\`" :value="item.id">
            <input type="hidden" :name="\`participants[removed][\${index}][user_id]\`" :value="item.user_id">
        </div>
        <div class="mt-2 mb-4">
            <div v-for="(participant, index) in participants" class="row">
                <div class="col-md-12">
                    <div class="row px-2" v-if="participant.id === -1">
                        <span class="pl-4 border-0 vertical-center col-md-1 text-end">{{ index + 1 }}</span>
                        <div class="tex-center col-md-2">{{ participant.username }}</div>
                        <div class="tex-center col-md-3">Ghost User</div>
                        <div class="col-md-2 mx-4">{{ participant.game_user_id }}</div>
                        <a class="border-0 vertical-center" @click="remove(index, participant)"><i class="booked-icon ion-close-circled border-0"></i></a>
                    </div>
                    <div class="row px-2" v-else-if="participant.added">
                        <span class="pl-4 border-0 vertical-center col-md-1 text-end">{{ index + 1 }}</span>
                        <div class="tex-center col-md-2">{{ participant.username }}</div>
                        <div class="tex-center col-md-3"> {{ participant.firstName + ' ' + participant.lastName }} </div>
                        <div class="col-md-2 mx-4">{{ participant.game_user_id }}</div>
                        <a class="border-0 vertical-center" @click="remove(index, participant)"><i class="booked-icon ion-close-circled border-0"></i></a>
                    </div>
                    <div class="row px-2" v-else-if="!participant.deleted">
                        <span class="pl-4 border-0 vertical-center col-md-1 text-end">{{ index + 1 }}</span>
                        <div class="tex-center col-md-2">{{ participant.username }}</div>
                        <div v-if="participant.type" class="tex-center col-md-3"> {{ participant.first_name + ' ' + participant.last_name }} </div>
                        <div v-else="participant.type" class="tex-center col-md-3"> Ghost User </div>
                        <div class="col-md-2 mx-4">{{ participant.game_user_id }}</div>
                        <a class="border-0 vertical-center" @click="remove(index, participant)"><i class="booked-icon ion-close-circled border-0"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary" :disabled="!isNewParticipants">Actualizar</button>
        </form>
    `
}