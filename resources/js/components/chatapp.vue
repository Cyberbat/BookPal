

<template>
    <div class="chat-app">
        <Convo :contact="selectedContact" :messages="messages" @new="savenew"/>
        <Contacts :contacts="contacts" @selected="startConversationWith"/>
    </div>
</template>



<script>
    import Convo from './Convo';

    import Contacts from './Contacts';
    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },

        data() {
            return {
                selectedContact: null,
                messages: [],
                contacts: []
            };
        },

        mounted() {

           Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e) => {
                    this.hanleIncoming(e.message);
                });

            axios.get('/contacts')
                .then((response) => {
                    this.contacts = response.data;
                });
        },

        methods: {
            startConversationWith(contact) {
                this.updateUnreadCount(contact, true);

                axios.get(`/conversation/${contact.id}`)
                    .then((response) => {
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })
            
        },

             savenew(message) {
                this.messages.push(message);
            },

             hanleIncoming(message) {
                if (this.selectedContact && message.from == this.selectedContact.id) {
                    this.savenew(message);
                    return;
                }
                this.updateUnreadCount(message.from_contact, false);

    },
         updateUnreadCount(contact, reset) {
                this.contacts = this.contacts.map((single) => {
                    if (single.id !== contact.id) {
                        return single;
                    }
                    if (reset)
                        single.unread = 0;
                    else
                        single.unread += 1;
                    return single;
                })
            },
        
    },
    components: {Contacts, Convo}
};
</script>


<style lang="scss" scoped>
.chat-app {
    display: flex;
}
</style>