<template>
    
    <div class="contacts">
 
 	<ul>
 		<li v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{'selected': contact==selected}">
 			
			<div class="profimage">

				<img v-bind:src="'/storage/' + contact.avatar_path"  :alt="contact.name" width="50px" height="40px">



			</div>

			<div class="contact">
			<p class="name">{{contact.name}} </p>
            <span class="unread" v-if="contact.unread">{{contact.unread}}</span>

			</div>

 		</li>

 	</ul>

    
    </div>
    

</template>



<script>

   export default {

   	props:{

   		contacts:{
   			type:Array,
   			default:[]
   		}

	},

	data(){

		return{

			selected: this.contacts.length ? this.contacts[0] : null
		};
      
    },

    methods:{

    	selectContact(contact){

    		this.selected= contact;

    		this.$emit('selected',contact);
    	}
    },

    computed: {
            sortedContacts() {
                return _.sortBy(this.contacts, [(contact) => {
                    if (contact == this.selected) {
                        return Infinity;
                    }
                    return contact.unread;
                }]).reverse();
            }
        }



	};


</script>

<style lang="scss" scoped>
.contacts {
    flex: 1;
    max-height: 600px;
    overflow: scroll;
    border-left: 1px  #a6a6a6;
    
    ul {
        list-style-type: none;
        padding-left: 0;
        li {
            display: flex-left;
                margin: 12px;
            padding: 2px;
              height: 93px;
            position: center;
            cursor: pointer;
            &.selected {
                background: #dfdfdf;
            }
            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }
            .profimage {
                flex: 1;
                display: flex;
                align-items: center;
                img {
                    width: 35px;
                    border-radius: 50%;
                    margin: 0 auto;
                }
            }
            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;
                p {
                    margin: 0;
                    &.name {
                        font-weight: bold;
                        font-size:15px;
                            margin-left: 62px;
                    }
                }
            }
        }
    }
}
</style>