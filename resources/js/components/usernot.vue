<template>

	<li class="nav-item dropdown" v-if="notifications.length">
	<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve" width="30px" height="30px">
<g>
	<g>
		<path d="M149.996,0C67.157,0,0.001,67.161,0.001,149.997S67.157,300,149.996,300s150.003-67.163,150.003-150.003    S232.835,0,149.996,0z M149.999,232.951c-10.766,0-19.499-8.725-19.499-19.499h38.995    C169.497,224.226,160.765,232.951,149.999,232.951z M215.889,193.9h-0.005v-0.001c0,7.21-5.843,7.685-13.048,7.685H97.16    c-7.208,0-13.046-0.475-13.046-7.685v-1.242c0-5.185,3.045-9.625,7.42-11.731l4.142-35.753c0-26.174,18.51-48.02,43.152-53.174    v-13.88c0-6.17,5.003-11.173,11.176-11.173c6.17,0,11.173,5.003,11.173,11.173V92c24.642,5.153,43.152,26.997,43.152,53.174    l4.142,35.758c4.375,2.109,7.418,6.541,7.418,11.726V193.9z" fill="#006DF0"/>
	</g>
</g>

</svg>


	</a>

	<ul class="dropdown-menu" style="
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 20px 27px 20px 27px;
    box-sizing: content-box;
    z-index: 1;">
	<li v-for="notification in notifications" style="margin: 1%">
		
		<a :href="notification.data.link" v-text="notification.data.message" ></a>
		<hr>

	</li>

	</ul>
	</li>
</template>

<script>
 

   export default {

   	data(){

   		user:''

   		return {notifications: false}
   	},

   	created(){
   		axios.get("/profile/"+this.user+"/notifications")
   		.then(response=>this.notifications=response.data);
   	},

   	


   	};


</script>