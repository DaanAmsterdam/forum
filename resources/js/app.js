// instantiate the window.Vue before the ./bootstrap
// the ./bootstrap uses the window.vue

window.Vue = require('vue');

require('./bootstrap');

// all the components
import FlashComponent from './components/Flash.vue';
import ReplyComponent from './components/Reply.vue';

Vue.component('flash', FlashComponent);
Vue.component('reply', ReplyComponent);

// the Vue instance...
let app = new Vue({
    el: '#app'
});
