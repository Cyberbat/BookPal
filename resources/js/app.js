
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('flash', require('./components/flash.vue'));


Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-app', require('./components/chatapp.vue'));
Vue.component('user-not', require('./components/usernot.vue'));
// Vue.component('requestbook', require('./components/requestbook.vue'));
import InstantSearch from 'vue-instantsearch';

Vue.use(InstantSearch);

const app = new Vue({
    el: '#app'
});
