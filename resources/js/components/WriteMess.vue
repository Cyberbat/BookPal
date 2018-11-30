<template>
	
<div class="write">

	<textarea v-model="message" @keydown.enter="send" placeholder="Your Message"></textarea>

</div>


</template>

<script>

export default{

	data(){
		return{
			message:''
		};
	},

	methods:{

		send(e){

			e.preventDefault();

			if(this.message ==''){
				return;
			}

			this.$emit('send', this.message);

			this.message='';
		}


	}


};

</script>


<style lang="scss" scoped>
.write textarea {
    width: 96%;
    margin: 10px;
    resize: none;
    border-radius: 3px;
    border: 1px solid white;
    padding: 6px;
}
</style>