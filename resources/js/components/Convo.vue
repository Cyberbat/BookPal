<template>
    
    <div class="convo">
 	
 		<h1>{{contact ? contact.name: 'Select the contact you wish to exchange with'}}</h1>

 		<Message :contact="contact" :messages="messages"/>
 		<WriteMess @send="sendMessage"></WriteMess>
    
    </div>


</template>

<script>
   	import Message from './Message';
	import WriteMess from './WriteMess';

   export default {



   	props:{

     		contact:{

     			type:Object,
     			default:null
     		},

     		messages:{

     			type:Array,
     			default:[]
     		}

   	},

   	methods:{

   		sendMessage(text){

   			if(!this.contact){
          return;
        }

             axios.post('/conversation/send', {
             contact_id: this.contact.id,
             text: text }).then((response) => {

                    this.$emit('new', response.data);
                })
            }
   		
   	},

   	components:{

            Message, WriteMess
        }


    
    };


</script>

<style lang="scss" scoped>
.convo {
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    h1 {
        font-size: 20px;
        padding: 10px;
        margin: 0;
        border-bottom: 1px solid white;
    }
}
</style>